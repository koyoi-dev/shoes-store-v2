<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shoe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    private null|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->cart = Cart::query()->where('user_id', Auth::id())->first();
            return $next($request);
        });
    }

    public function index()
    {
        $code = Str::random(6);
        return view('cart', [
            'cart' => $this->cart,
            'code' => $code
        ]);
    }

    public function add(Request $request, Shoe $shoe)
    {
        $data = $request->validate([
            'shoe_id' => ['required', 'numeric'],
            'size' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:0']
        ]);

        $this->cart->items()->create([
            'size_id' => $data['size'],
            'shoe_id' => $data['shoe_id'],
            'quantity' => $data['quantity'],
        ]);

        return redirect()->route('cart');
    }

    public function update(Request $request, Shoe $shoe)
    {
        $data = $request->validate([
            'quantity' => ['required', 'numeric', 'min:0']
        ]);

        // https://laravel.com/docs/9.x/eloquent-relationships#updating-a-record-on-the-intermediate-table
        $this->cart->shoes()->updateExistingPivot($shoe->id, [
            'quantity' => $data['quantity']
        ]);

        return redirect()
            ->route('cart')
            ->with('message', 'Updated quantity for ' . $shoe->name);
    }

    public function destroy(Shoe $shoe)
    {
        $this->cart->items()->where('shoe_id', $shoe->id)->delete();
        return redirect()
            ->route('cart')
            ->with('message', 'Successfully remove ' . $shoe->name);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'code' => ['required', 'confirmed']
        ]);

        $transactionData = $request->except('code', 'code_confirmation');

        $items = $this->cart->items()->get();
        $user = $request->user();


        $transaction = $user->transactions()->create($transactionData);

        $orders = [];
        foreach ($items as $item) {
            // map orders;
            $orders[] = [
                'image' => $item->shoe->images()->first()->path,
                'name' => $item->shoe->name,
                'price' => $item->shoe->price,
                'quantity' => $item->quantity,
                'size' => $item->size->us,
                'subtotal' => $item->shoe->price * $item->quantity,
            ];

            // update quantity
            $oldQuantity = $item->shoe->sizes()->where('size_id', $item->size->id)->first()->stock->quantity;
            $newQuantity = $oldQuantity - $item->quantity;
            $item->shoe->sizes()->updateExistingPivot($item->size->id, [
                'quantity' => $newQuantity
            ]);
        }
        $transaction->orders()->createMany($orders);

        // Delete all cart items
        $this->cart->items()->delete();

        return redirect()->route('transactions');
    }
}

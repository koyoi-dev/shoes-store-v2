@extends('layouts.app')

@section('title', 'Edit Shopping Cart')

@section('content')
    <section class="container py-4">
        <h1 class="fw-bold fs-3">Edit Cart</h1>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr class="small">
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->items()->get() as $item)
                        <tr class="align-middle small">
                            <td>
                                <div class="hstack gap-2 align-items-center">
                                    <div style="width: 100px; height: 100px">
                                        <img class="img-fluid"
                                             src="{{ asset('/storage/' . $item->shoe->images->first()->path) }}"
                                             alt="...">
                                    </div>
                                    <div>
                                        <span class="d-block text-uppercase fw-bold">{{ $item->shoe->name }}</span>
                                        <span class="badge text-bg-secondary">US {{ $item->size->us }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>Rp. {{ number_format($item->shoe->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp. {{ number_format($item->quantity * $item->shoe->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('cart.edit', $cart->id) }}" class="btn btn-danger">Edit Cart</a>
            </div>
        </div>
    </section>
@endsection

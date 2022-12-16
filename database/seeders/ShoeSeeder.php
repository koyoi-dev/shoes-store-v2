<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Shoe;
use App\Models\Size;
use App\Models\Style;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $brands = Brand::all();
        $categories = Category::all();
        $styles = Style::all();
        $sizes = Size::all();

        $image_paths = collect([
            [
                ['path' => "shoes/dummy/1.jpg"],
                ['path' => "shoes/dummy/2.jpg"],
                ['path' => "shoes/dummy/3.jpg"]
            ],
        ]);

        for ($i = 0; $i <= 15; $i++) {
            $brand = $brands->random();
            $category = $categories->random();
            $style = $styles->random();
            $images = $image_paths->random();
            $shoeSizes = $sizes->shuffle()->take(3)->mapWithKeys(function ($size) use ($faker) {
                return [$size->id => ['quantity' => $faker->numberBetween(0, 10)]];
            })->all();
            $shoe = Shoe::query()
                ->create([
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                    'style_id' => $style->id,
                    'name' => $brand->name . ' ' . $faker->words('4', true),
                    "description" => "<p>Built for comfort and endless energy-return, these men's running shoes help make every run your best. They have a socklike adidas Primeknit+ upper and responsive Boost cushioning. A Linear Energy Push system enhances midfoot and forefoot stiffness for extra energy in every step. This product is made with Primeblue, a high-performance recycled material made in part with Parley Ocean Plastic.</p> <p><strong>Size Disclaimer: </strong>There may be a 1-2cm difference in measurements depending on the development and manufacturing process.</p> <p><strong>Color Disclaimer: </strong>Actual colors may vary. This is due to the fact that every computer monitor has a different capability to display colors, we cannot guarantee that the color you see accurately portrays the true color of the product.</p>",
                    'price' => $faker->numberBetween(1000000, 10000000)
                ]);

            $shoe->sizes()->sync($shoeSizes);
            $shoe->images()->createMany($images);
        }
    }
}

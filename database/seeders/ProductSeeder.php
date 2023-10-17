<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Product::create([
        //   'name' => 'Product Name',
        //   'description' => 'Product Description',
        //   'price' => 50.00,
        //   'category' => 'Category',
        //   'photo' => 'product-image.jpg',
        //   'stock' => 100,
        // ]);

        $data = [
          [
            'name' => 'Sambal Geprek',
            'description' => 'Pedes Banget',
            'price' => 19.99,
          ],
          [
            'name' => 'Sambal Cabe Ijo',
            'description' => 'Tidak Pedas Banget',
            'price' => 29.99,
          ],
        ];

        Product::insert($data);
    }
}

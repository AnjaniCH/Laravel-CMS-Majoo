<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //product create buat isi data dari si productnya
        /*   BUAT ISI GAMBAR ====>>>>> <img src="image/<?php echo $data['nama_image']; ?>" border="0"/>*/

        Product::create([

            'name' => 'Majoo Pro',
            'brand' => 'HP',
            'image' => 'img/12445.png',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s. when an uknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'price' => 2750000,
            'discount' => 0,
            'stock' => 8
        ]);

        Product::create([
            'name' => 'Majoo Advance',
            'brand' => 'Lenovo',
            'image' => 'img/15581.png',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s. when an uknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'price' => 2750000,
            'discount' => 0,
            'stock' => 6
        ]);

        Product::create([
            'name' => 'Majoo Lifestyle',
            'brand' => 'Lenovo',
            'image' => 'img/11206.png',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s. when an uknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'price' => 2750000,
            'discount' => 0,
            'stock' => 9
        ]);

        Product::create([
            'name' => 'Majoo Desktop',
            'brand' => 'Asus',
            'image' => 'img/39015.png',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s. when an uknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
            'price' => 2750000,
            'discount' => 0,
            'stock' => 6
        ]);

    }
}

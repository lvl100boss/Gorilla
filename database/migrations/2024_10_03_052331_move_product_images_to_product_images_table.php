<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Move existing image data from products table to product_images table
    $products = DB::table('products')->whereNotNull('image')->get();

    foreach ($products as $product) {
        DB::table('product_images')->insert([
            'product_id' => $product->id,
            'image_path' => $product->image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

    public function down()
    {
        // If you want to revert the migration, you'd remove the entries from product_images table
        DB::table('product_images')->truncate();
    }

};

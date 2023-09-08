<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
               DB::table('products')->insert([
                'name' => 'Apple Watch Series 32 Sp',
                'image'=> '6.jpg',
                'cate_id'=>'3',
                'selling_price'=>'750',
                'original_price'=>'730',
                'qty'=>'50',
                'tax'=>'0',
                'slug'=>'2',
                'status'=>'1',
                'trending'=>'0',
                'small_description'=>'Apple Watch Series 32 Sp',
                'description'=>'Apple Watch Series 32 Sp',
                'meta_title'=>'Apple Watch Series 32 Sp',
                'meta_keyword'=>'Apple Watch Series 32 Sp',
                'meta_description'=>'Apple Watch Series 32 Sp',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
    
               ]);
    }
}

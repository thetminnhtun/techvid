<?php

use App\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->delete();

        $json = File::get(public_path() . "/files/sub_categories.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {
            SubCategory::create([
            	'name'=>$obj->name,
            	'category_id'=>$obj->category_id,
            ]);
        }
    }
}
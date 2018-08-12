<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $json = File::get(public_path() . "/files/categories.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {
            Category::create(['name'=>$obj->name, ]);
        }
    }
}

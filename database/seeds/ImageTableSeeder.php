<?php

use App\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();

        $json = File::get(public_path() . "/files/images.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {
            Image::create([
            	'name'=>$obj->name,
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $json = File::get(public_path() . "/files/roles.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {

            DB::table('roles')->insert([
                'name'       => $obj->name,
                'guard_name' => $obj->guard_name,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
            ]);
        }
    }
}

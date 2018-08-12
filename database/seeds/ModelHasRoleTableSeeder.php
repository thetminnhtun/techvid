<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ModelHasRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('model_has_roles')->delete();

        $json = File::get(public_path() . "/files/model_has_roles.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {

            DB::table('model_has_roles')->insert([
                'role_id'    => $obj->role_id,
                'model_type' => $obj->model_type,
                'model_id'   => $obj->model_id,
            ]);
        }
    }
}

<?php

use App\VerifyUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VerifyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('verify_users')->delete();

        $json = File::get(public_path() . "/files/verify_users.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {
            VerifyUser::create([
            	'user_id'=>$obj->user_id,
            	'token'=>$obj->token,
            ]);
        }
    }
}

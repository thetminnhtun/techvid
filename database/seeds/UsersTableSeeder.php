<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $json = File::get(public_path() . "/files/users.json");
        $objs = json_decode($json);

        foreach ($objs as $obj) {
            User::create([
            	'name'=>$obj->name,
            	'email'=>$obj->email,
            	'password'=>$obj->password,
            	'verified'=>$obj->verified,
            	'remember_token'=>$obj->remember_token,
            ]);
        }
    }
}

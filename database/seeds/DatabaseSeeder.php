<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(VerifyUsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ModelHasRoleTableSeeder::class);
        $this->call(CourseTableSeeder::class);
    }
}

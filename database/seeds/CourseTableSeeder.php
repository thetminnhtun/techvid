<?php

use App\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        for ($j = 1; $j <= 9; $j++) {
            for ($i = 1; $i <= 20; $i++) {
                Course::create([
                    'name'            => $i . "_Course",
                    'sub_category_id' => $j,
                    'video_name'=> "1534493519_Adele - Hello (Lyrics).mp4"
                ]);
            }
        }
    }
}

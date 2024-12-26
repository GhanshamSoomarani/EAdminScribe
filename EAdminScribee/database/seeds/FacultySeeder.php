<?php

use App\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    public function run()
    {
        Faculty::create(['name' => 'Faculty of Architecture & Civil Engineering']);
        Faculty::create(['name' => 'Faculty of Electrical, Electronic & Computer Engineering']);
        Faculty::create(['name' => 'Faculty of Mechanical, Process & Earth Engineering']);
        Faculty::create(['name' => 'Faculty of Sciences Technology & Humanities']);
    }
}

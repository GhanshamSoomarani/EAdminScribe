<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Ghansham',
                'email'          => 'gsoomarani12@gmail.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 2,
                'name'           => 'Exam Department',
                'email'          => 'examcontroller@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 3,
                'name'           => 'Finance MUET',
                'email'          => 'financemuet@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 4,
                'name'           => 'Faculty of Architecture & Civil Engineering',
                'email'          => 'dean.architecture_civil@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],
            [
                'id'             => 5,
                'name'           => 'Faculty of Electrical, Electronic & Computer Engineering',
                'email'          => 'ghanshamlsoomarani@gmail.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 6,
                'name'           => 'Faculty of Mechanical, Process & Earth Engineering',
                'email'          => 'dean.mechanical_process_earth@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 7,
                'name'           => 'Faculty of Sciences Technology & Humanities',
                'email'          => 'dean.sciences_technology_humanities@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 8,
                'name'           => 'Chairman Architecture',
                'email'          => 'chairman.ar@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 9,
                'name'           => 'Chairman BSRS',
                'email'          => 'chairman.bsrs@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],



            [
                'id'             => 10,
                'name'           => 'Chairman Civil Engineering',
                'email'          => 'chairman.ce@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 11,
                'name'           => 'Chairman Environmental Engineering',
                'email'          => 'chairman.ee@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 12,
                'name'           => 'Chairman Institute of Water Resources Engineering & Management',
                'email'          => 'chairman.iwr@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,

            ],

            [
                'id'             => 13,
                'name'           => 'Chairman Software',
                'email'          => 'studentmr65@gmail.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 14,
                'name'           => 'Chairman Electrical Engineering',
                'email'          => 'chairman.el@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 15,
                'name'           => 'Chairman Computer Systems Engineering',
                'email'          => 'chairman.cs@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 16,
                'name'           => 'Chairman Electronic Engineering',
                'email'          => 'chairman.es@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 17,
                'name'           => 'Chairman Telecommunication Engineering',
                'email'          => 'chairman.tl@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 18,
                'name'           => 'Chairman Bio-Medical Engineering',
                'email'          => 'chairman.bm@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 19,
                'name'           => 'Chairman Industrial Engineering & Management',
                'email'          => 'chairman.in@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 20,
                'name'           => 'Chairman Mechanical Engineering',
                'email'          => 'chairman.me@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 21,
                'name'           => 'Chairman Mechatronic Engineering',
                'email'          => 'chairman.mte@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 22,
                'name'           => 'Chairman Metallurgy & Materials Engineering',
                'email'          => 'chairman.mt@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 23,
                'name'           => 'Chairman Mining Engineering',
                'email'          => 'chairman.mn@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 24,
                'name'           => 'Chairman Petroleum & Natural Gas Engineering',
                'email'          => 'chairman.pg@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 25,
                'name'           => 'Chairman Textile Engineering',
                'email'          => 'chairman.te@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 26,
                'name'           => 'Chairman Chemical Engineering',
                'email'          => 'chairman.ch@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 27,
                'name'           => 'Chairman Centre of English Language & Linguistics',
                'email'          => 'chairman.cell@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 28,
                'name'           => 'Chairman Mehran University Institute of Science, Technology & Development',
                'email'          => 'chairmanm.usit@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 29,
                'name'           => 'Chairman City & Regional Planning',
                'email'          => 'chairman.crp@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 30,
                'name'           => 'Zohaib',
                'email'          => 'zohaib@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

            [
                'id'             => 31,
                'name'           => 'Naveen',
                'email'          => 'naveen@muet.com',
                'password'       => '$2y$10$9xyYOAbLrInBYyHHez4AIut.oWddC3.5MObmkqkvIJpQdjOoFaufK',
                'remember_token' => null,
            ],

        ];

        User::insert($users);
    }
}

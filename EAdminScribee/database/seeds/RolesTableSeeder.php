<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'User',
            ],
            [
                'id'    => 3,
                'title' => 'Dean',
            ],
            [
                'id'    => 4,
                'title' => 'Exam Controller',
            ],
            [
                'id'    => 5,
                'title' => 'Chairman',
            ],
            [
                'id'    => 6,
                'title' => 'Finance',
            ]

        ];

        Role::insert($roles);
    }
}

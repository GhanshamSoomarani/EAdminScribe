<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id'   => 1,
                'name' => 'Processing',
            ],
            [
                'id'   => 2,
                'name' => 'Dean processing',
            ],
            [
                'id'   => 3,
                'name' => 'Dean approved',
            ],
            [
                'id'   => 4,
                'name' => 'Dean rejected',
            ],
            [
                'id'   => 5,
                'name' => 'Exam Department processing',
            ],
            [
                'id'   => 6,
                'name' => 'Exam Department approved',
            ],
            [
                'id'   => 7,
                'name' => 'Exam Department rejected',
            ],
            [
                'id'   => 8,
                'name' => 'Approved',
            ],
            [
                'id'   => 9,
                'name' => 'Rejected',
            ],
            [
                'id'   => 10,
                'name' => 'Chairman processing',
            ],
            [
                'id'   => 11,
                'name' => 'Chairman approved',
            ],
            [
                'id'   => 12,
                'name' => 'Chairman rejected',
            ],
            [
                'id'   => 13,
                'name' => 'Finance processing',
            ],
            [
                'id'   => 14,
                'name' => 'Finance approved',
            ],
            [
                'id'   => 15,
                'name' => 'Finance rejected',
            ],

        ];

        Status::insert($statuses);
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        $userRoles = [
            1 => [1],
            2 => [4],
            3 => [6],
            4 => [3],
            5 => [3],
            6 => [3],
            7 => [3],
            8 => [5],
            9 => [5],
            10 => [5],
            11 => [5],
            12 => [5],
            13 => [5],
            14 => [5],
            15 => [5],
            16 => [5],
            17 => [5],
            18 => [5],
            19 => [5],
            20 => [5],
            21 => [5],
            22 => [5],
            23 => [5],
            24 => [5],
            25 => [5],
            26 => [5],
            27 => [5],
            28 => [5],
            29 => [2],
            30 => [2],
        ];

        foreach ($userRoles as $userId => $roles) {
            $user = User::find($userId);
            if ($user) {
                $user->roles()->sync($roles);
            } else {
                Log::warning("User with ID $userId not found.");
            }
        }
    }
}

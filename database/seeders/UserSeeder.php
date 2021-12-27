<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = [
            '1' => ['1', 2, 'Admin', 'demo@gmail.com', 'demo'],
            '2' => ['2', 1, 'Client', 'democlient@gmail.com', 'democlient'],
        ];

        foreach ($record as $key => $value) {
            User::updateOrCreate([
                'id' => $key
            ], [
                'role_id' => $value[1],
                'first_name' => $value[2],
                'email' => $value[3],
                'password' => bcrypt($value[4])
            ]);
        }
    }
}

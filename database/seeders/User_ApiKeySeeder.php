<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class User_ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 2; $i++) {
            $user = User::findOrFail($i);
            $user->update([
                'api_key' => md5($user->first_name . time() . rand())
            ]);
        }
    }
}

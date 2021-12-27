<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = 'Client';
        Role::create([
            'name' => $client,
            'slug' => Str::slug($client, '-'),
            'status' => 1,
        ]);

        $superadmin = 'Super Admin';
        Role::create([
            'name' => $superadmin,
            'slug' => Str::slug($superadmin, '-'),
            'status' => 1,
        ]);

        $admin = 'Admin';
        Role::create([
            'name' => $admin,
            'slug' => Str::slug($admin, '-'),
            'status' => 1,
        ]);
    }
}

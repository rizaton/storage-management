<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Admin']);
        (User::create([
            'name' => 'Ahmad Fikri Haikal',
            'username' => 'fikalahmad',
            'email' => 'fikal2ahmad@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('fikal2'),
            'remember_token' => Str::random(10),
        ]))->assignRole($role);
        $user = User::factory()->create([
            'name' => 'Tony Afriza',
            'username' => 'rizaton',
            'email' => 'rizaton@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testing123'),
            'remember_token' => Str::random(10),
        ]);
        // $permission = Permission::create(['name' => 'edit articles']);
        $user->assignRole($role);
    }
}

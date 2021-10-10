<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $admin = User::create([
            'name' => "Mushe Abdul-Hakim",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
        ]);
        $sales = User::create([
            'name' => 'John Doe',
            'email' => 'sales@sales.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('super-admin');
        $sales->assignRole('sales');
    }
}

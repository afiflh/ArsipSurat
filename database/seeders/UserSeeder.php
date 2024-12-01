<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Add this line to import the Str class
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'afif',
            'email' => 'afif@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(60), // Use the Str class to generate a random string
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->delete();
        
        User::create([
            'schoolId'  =>  '40943257',
            'name'      =>  '蘇偉勝',
            'email'     =>  '40943257@nfu.edu.tw',
            'password'  =>  Hash::make('40943257')
        ]);
    }
}

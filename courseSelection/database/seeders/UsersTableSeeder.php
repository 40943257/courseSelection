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
            'account'       =>  '40943257',
            'name'          =>  '蘇偉勝',
            'email'         =>  '40943257@nfu.edu.tw',
            'password'      =>  Hash::make('40943257'),
            'permissions'   =>  2
        ]);

        User::create([
            'account'       =>  '40943258',
            'name'          =>  '蘇富羿',
            'email'         =>  '40943258@nfu.edu.tw',
            'password'      =>  Hash::make('40943258'),
            'permissions'   =>  2
        ]);

        User::create([
            'account'       =>  'teacher',
            'name'          =>  'teacher',
            'email'         =>  'teacher@nfu.edu.tw',
            'password'      =>  Hash::make('teacher'),
            'permissions'   =>  1
        ]);
    }
}

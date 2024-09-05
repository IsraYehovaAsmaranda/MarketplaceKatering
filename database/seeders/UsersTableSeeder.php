<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Isra Yehova',
            'email'=>'isra@gmail.com',
            'password'=>Hash::make('1234'),
            'is_merchant'=>'0',
            'address'=>'address',
            'contact'=>'81259950915',
            'description'=>'mydescription',
        ]);
    }
}

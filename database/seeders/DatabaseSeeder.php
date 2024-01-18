<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::create([
             'login' => 'admin_adminskiy',
             'nickname' => 'ksenia',
             'password' => md5('321zzz321zzz'),
             'is_admin' => true,
             'avatar' => 'sfaobnsafdfoin'
         ]);
    }
}

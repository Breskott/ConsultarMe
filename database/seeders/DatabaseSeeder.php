<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'          => 'Victor Brescott Leandro Figueiredo',
            'email'         => 'victorbrescott@hotmail.com',
            'cpf'           => '387.921.858-78',
            'is_permission' => 2, // Admin
            'password'      => '$2y$10$cEqYfnXcTkIj3zpYwb7voe1aGLRaWvCrIYuCq9F2FH6BZQM3Oolsi',
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);
    }
}

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

        // Insere tarumã como padrão e cidades proximas
        DB::table('cities')->insert([
            'description'   => 'Tarumã',
            'state'           => 'SP'
        ]);
        DB::table('cities')->insert([
            'description'   => 'Assis',
            'state'         => 'SP'
        ]);
        DB::table('cities')->insert([
            'description'   => 'Cândido Mota',
            'state'         => 'SP'
        ]);

        DB::table('cities')->insert([
            'description'   => 'Florínea',
            'state'         => 'SP'
        ]);

        // Cria o usuário administrador
        DB::table('users')->insert([
            'name'          => 'Victor Brescott',
            'email'         => 'victorbrescott@hotmail.com',
            'cpf'           => '387.921.858-78',
            'is_permission' => 2, // Admin
            'password'      => '$2y$10$cEqYfnXcTkIj3zpYwb7voe1aGLRaWvCrIYuCq9F2FH6BZQM3Oolsi',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Teste',
            'number'        => '20',
            'distric'       => 'Vila Teste',
            'complement'    => 'Casa perto da árvore',
            'city_id'       => 1,
            'birth_date'    => '1997-03-03',
            'phone'         => '(18) 9990-0001',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        // Cria um posto de saúde
        DB::table('units')->insert([
            'description'   => 'PSF Lagos/Árvores',
            'phone'         => ' (18) 3373-4502',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Canjarana',
            'number'        => '73',
            'distric'       => 'Vila das Árvores',
            'city_id'       => 1,
        ]);
    }
}

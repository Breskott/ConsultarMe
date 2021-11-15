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

        // Cria cidades proximas a regiao
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
        // Fim Cadastro de cidades proximas ====================================

        // Cria o usuário administrador
        DB::table('users')->insert([
            'name'          => 'Administrador',
            'email'         => 'admin@breskott.com.br',
            'cpf'           => '000.000.000-00',
            'is_permission' => 2, // Admin
            'password'      => '$2y$10$cEqYfnXcTkIj3zpYwb7voe1aGLRaWvCrIYuCq9F2FH6BZQM3Oolsi',
            'zip_code'      => '00000-000',
            'address'       => 'Rua Administrador',
            'number'        => '0',
            'distric'       => 'Bairro Administrador',
            'complement'    => '',
            'city_id'       => 1,
            'birth_date'    => '1997-01-01',
            'phone'         => '(00) 00000-0000',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'          => 'Agente',
            'email'         => 'agente@breskott.com.br',
            'cpf'           => '000.000.000-01',
            'is_permission' => 1, // Admin
            'password'      => '$2y$10$cEqYfnXcTkIj3zpYwb7voe1aGLRaWvCrIYuCq9F2FH6BZQM3Oolsi',
            'zip_code'      => '00000-000',
            'address'       => 'Rua Agente',
            'number'        => '0',
            'distric'       => 'Bairro Agente',
            'complement'    => '',
            'city_id'       => 1,
            'birth_date'    => '1997-01-01',
            'phone'         => '(00) 00000-0000',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'          => 'Victor Brescott Leandro Figueiredo',
            'email'         => 'victorbrescott@hotmail.com',
            'cpf'           => '387.921.858-78',
            'is_permission' => 0, // Admin
            'password'      => '$2y$10$cEqYfnXcTkIj3zpYwb7voe1aGLRaWvCrIYuCq9F2FH6BZQM3Oolsi',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Diamante',
            'number'        => '20',
            'distric'       => 'Vila Cristal',
            'complement'    => 'Casa CDHU',
            'city_id'       => 1,
            'birth_date'    => '1997-03-03',
            'phone'         => '(18) 99693-0799',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        // Fim criação usuário =================================================

        // Cria os postos de saúde =============================================
        DB::table('units')->insert([
            'description'   => 'PSF Lagos/Árvores',
            'phone'         => '(18) 3373-4502',
            'extension'     => '',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Canjarana',
            'number'        => '73',
            'distric'       => 'Vila das Árvores',
            'city_id'       => 1,
        ]);
        DB::table('units')->insert([
            'description'   => 'PSF Centro',
            'phone'         => '(18) 3373 4500',
            'extension'     => '6101',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Pernambuco',
            'number'        => '30',
            'distric'       => 'Centro',
            'city_id'       => 1,
        ]);
        DB::table('units')->insert([
            'description'   => 'PSF Dourados',
            'phone'         => '(18) 3373 4500',
            'extension'     => '6601',
            'zip_code'      => '19820-000',
            'address'       => 'Avenida Paraná',
            'number'        => '499',
            'distric'       => 'Vila Dourados',
            'city_id'       => 1,
        ]);
        DB::table('units')->insert([
            'description'   => 'PSF Pássaros',
            'phone'         => '(18) 3373-4502',
            'extension'     => '6401',
            'zip_code'      => '19820-000',
            'address'       => 'Rua Rouxinol',
            'number'        => '11',
            'distric'       => 'Vila dos Pássaros',
            'city_id'       => 1,
        ]);
        // Fim criação posto de saúde =============================================

        // Cria exame / especialidade
        DB::table('exam_specialty')->insert([
            'description'   => 'Alergia e imunologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Anestesiologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Cardiologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Cirurgia geral',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Clínica médica',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Dermatologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Endocrinologia e metabologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Endoscopia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Gastroenterologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Geriatria',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Ginecologia e obstetrícia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Hematologia e hemoterapia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Infectologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Medicina da família',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Medicina do trabalho',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Medicina intensiva',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Medicina legal e perícia médica',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Nefrologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Neurocirurgia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Neurologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Nutrologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Oftalmologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Oncologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Ortopedia e traumatologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Otorrinolaringologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Patologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Pediatria',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Pneumologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Psiquiatria',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Reumatologia',
        ]);
        DB::table('exam_specialty')->insert([
            'description'   => 'Urologia',
        ]);
        // Fim criação exames/especialidades ======================================
    }
}

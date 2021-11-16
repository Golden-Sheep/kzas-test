<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'ativo' => 1,
        ]);
    }
}

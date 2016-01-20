<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CuentasFacturas\User::class)->create([
            'name' => 'Luigi',
            'username' => 'luigi',
            'email' => 'lapa@mail.com',
            'password' => bcrypt('12345'),
            'remember_token' => str_random(10)
        ]);

        factory(CuentasFacturas\User::class)->create([
            'name' => 'Diana',
            'username' => 'diana',
            'email' => 'diana@mail.com',
            'password' => bcrypt('12345'),
            'remember_token' => str_random(10)
        ]);

        factory(CuentasFacturas\User::class, 25)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('users')->insert([
            'names' 	            => 'Juan Francisco',
            'email' 		        => 'me@juanfrancisco.io',
            'address'               => 'Ciudad de Guatemala',
            'phone'                 => '2222-2222',
            'password' 		        => Hash::make('admin'),
            'created_at'            => date('Y-m-d H:i:s'),
            'status_id'             => 1,
            'rol_id'                => 1
        ]);
    }
}

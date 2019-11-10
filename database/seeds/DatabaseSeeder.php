<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
    }
}

class UserSeeder extends Seeder {
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'fullname'	=>	'Eric Bals',
        	'username'	=>	'herman',
        	'password'	=>	Hash::make('hermanEric'),
        	'email'		=>	'hackathon@societatea-hermes.ro',
        	'is_admin'	=>	1
        ]);
    }
}

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
        	'fullname'	=>	'Flaviu Porutiu',
        	'username'	=>	'glitch',
        	'password'	=>	Hash::make('theSecretPasswordIsReal'),
        	'email'		=>	'flaviu@glitch.ro',
        	'is_admin'	=>	1
        ]);
    }
}

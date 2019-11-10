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
        	'fullname'	=>	'Oana Sabadas',
        	'username'	=>	'oana',
        	'password'	=>	Hash::make('sclipiciOana'),
        	'email'		=>	's.oana.sabadas@gmail.com',
        	'is_admin'	=>	1
        ]);
    }
}

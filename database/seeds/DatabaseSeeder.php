<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = array( [
            'name' => 'Administrador',
            'email' => 'admin@laravel.com',
            'password' => bcrypt('admin1234')
            ] );
            foreach ($users as $key => $value) {
              User::create($value);
            }
          }

}

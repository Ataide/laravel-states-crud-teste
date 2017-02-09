<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      if (User::count() == 0 ) {        
        DB::table('users')->insert([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
          'name' => 'User',
          'email' => 'user@user.com',
          'password' => bcrypt('user')
        ]);
      }
    }
}

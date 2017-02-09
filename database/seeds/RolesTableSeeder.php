<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      if (Role::count() == 0) {
        DB::table('roles')->insert([
          'name' => 'admin',
          'display_name' => 'Usuario Administrador',
          'description' => 'Regra de permissao para usuarios administradores'
        ]);

        DB::table('roles')->insert([
          'name' => 'user',
          'display_name' => 'Usuario normal',
          'description' => 'Regra de permissao para a maioria dos usuarios'
        ]);

        DB::table('role_user')->insert([
          'user_id' => 1,
          'role_id' => 1
        ]);

        DB::table('role_user')->insert([
          'user_id' => 2,
          'role_id' => 2
        ]);
      }

    }
}

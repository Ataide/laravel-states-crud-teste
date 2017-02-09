<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( Permission::count() == 0 ) {

          DB::table('permissions')->insert([
            'name' => 'create',
            'display_name' => 'Criar',
            'description'  => 'Usuário pode criar registros'
          ]);

          DB::table('permissions')->insert([
            'name' => 'read',
            'display_name' => 'Ler',
            'description'  => 'Usuário pode ler os registros'
          ]);

          DB::table('permissions')->insert([
            'name' => 'update',
            'display_name' => 'Editar',
            'description'  => 'Usuário pode editar os registros'
          ]);

          DB::table('permissions')->insert([
            'name' => 'delete',
            'display_name' => 'Deletar',
            'description'  => 'Usuário pode deletar os registros'
          ]);

          //Cria as regras de permissões para o usuario padrão.
          //Admin: tem todas as permissões (CRUD).
          //User:  Somente Leitura (R).

          //ADMIN:
          DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id'       => '1'
          ]);

          DB::table('permission_role')->insert([
            'permission_id' => '2',
            'role_id'       => '1'
          ]);

          DB::table('permission_role')->insert([
            'permission_id' => '3',
            'role_id'       => '1'
          ]);

          DB::table('permission_role')->insert([
            'permission_id' => '4',
            'role_id'       => '1'
          ]);

          // USER:
          DB::table('permission_role')->insert([
            'permission_id' => '2',
            'role_id'       => '2'
          ]);

        }
    }
}

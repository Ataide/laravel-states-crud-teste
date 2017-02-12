<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\User;
use App\Estado;
use App\Role;
use App\Permission;


class PermissionController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function getUsersPermissions() {
    $users  = User::all();

    foreach ($users as $key => $value) {
      $result = DB::select('select roles.id from role_user inner join roles on (role_user.role_id = roles.id) inner join users on (role_user.user_id = users.id) where users.id = :id', ['id' => $value->id]);
      if($result){
        $value['group_id'] = json_decode(json_encode($result), true)[0]['id'];
      }
    }

    $groups = Role::all();

    return view('users', ['users' => $users, 'groups' => $groups]);
  }

  public function setUsersPermissions(Request $request) {
    $params = $request->all();
    Role::removeUserFromRoleGroup($params['id_usuario']);

    if( isset($params['group_id']) ) {
      $role = Role::find($params['group_id']);
      $user = User::find($params['id_usuario']);
      $user->attachRole($role);
    }

    return Redirect::to('estados');
  }


  public function getPermission(Request $request)
  {
    $groups_users = Role::all();
    $permissions = null;

    foreach ($groups_users as $key => $role) {
      $groups_users[$key]['permissions'] = $role->getPermission();
    }

    return view('permissions', ['groups' => $groups_users]);

  }

  public function setPermission(Request $request)
  {
    $params = $request->all();

    $admin = Role::find($params['group_id']);
    Role::detachAllPermissions($admin->id);

    if(isset($params['ids_permissions'])) {
      $permissions = $params['ids_permissions'];

      foreach ($permissions as $key => $value) {
        $admin->attachPermission(Permission::find($value));
      }
    }

    return Redirect::to('estados');
   }



}

<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use DB;

class Role extends EntrustRole
{
   public static function detachAllPermissions($id) {
      DB::delete('DELETE FROM permission_role WHERE role_id = ?',[$id]);
   }

   public static function removeUserFromRoleGroup($user_id) {
       DB::delete('DELETE FROM role_user WHERE user_id = ?',[$user_id]);
   }

   public function getPermission() {
     $result = DB::select('select permission_id from permission_role where role_id = :id', ['id' => $this->id]);
     $array = [];
     foreach ($result as $key => $value) {
       $array[$key] = $value->permission_id;
     }

     return $array;
   }

}

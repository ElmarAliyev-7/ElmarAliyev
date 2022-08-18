<?php
namespace App\Helpers;

use App\Models\MySkill;
use App\Models\RoleAndPermission;

class AppHelper
{
    public function checkPermisson($perm_id)
    {
        $auth_user_perms = RoleAndPermission::where("role_id", auth()->user()->role_id)->get();
        //Don't have any Permission
        if(count($auth_user_perms) == 0){
            return 0;
        }
        $perms_array = array();
        foreach($auth_user_perms as $auth_user_perm){
            array_push($perms_array, $auth_user_perm->permission_id);
        }

        if( !in_array($perm_id, $perms_array)){
            return 0;
        }
        return 1;
    }

    public function formatDate($start, $end)
    {
        $start_month = date("F", strtotime($start));
        $start_array = explode('-',$start);
        $start_date  = $start_array[2].' '.$start_month.' '.$start_array[0];
        if(!$end){
            return $start_date;
        }else{
            $end_month = date("F", strtotime($end));
            $end_array = explode('-',$end);
            $end_date  = $end_array[2].' '.$end_month.' '.$end_array[0];
            return $start_date.' - '.$end_date;
        }
    }

    public function getSkillChilds($parent_id)
    {
        $childs = MySkill::where('parent_id', $parent_id)->get();
        return $childs;
    }

    public function getProgramNameByKey($prog_key)
    {
        foreach ( config('settings.programs') as $key => $value){
            if($prog_key == $key){
                return $value;
            }
        }
    }

    public function getWorkTime($work_time)
    {
        if(gettype($work_time) == "NULL"){
            return '⛔';
        }else{
            foreach ( config('settings.work_time') as $key => $value){
                if($work_time == $key){
                    return strtoupper($value);
                }
            }
        }
    }

    public static function instance()
    {
        return new AppHelper();
    }
}


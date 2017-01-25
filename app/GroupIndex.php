<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GroupIndex extends Model
{
    //
    protected $table = 'group_index';
    public $timestamps = false;
    
    public static function addIndex ($groupName) {
        $exist = DB::table('group_index')->where('group_name', $groupName)->count();
        if ($exist > 0) {
            DB::table('group_index')->where('group_name', $groupName)->increment('last_index');;
        } else {
            $groupIndex = new GroupIndex;
        
            $groupIndex->group_name = $groupName;
            $groupIndex->last_index = 1;
        
            $groupIndex->save();
        }
        
        return GroupIndex::getLastIndex($groupName);
    }
    
    public static function getLastIndex ($groupName) {
        return DB::table('group_index')->where('group_name', $groupName)->pluck('last_index');
    }
}
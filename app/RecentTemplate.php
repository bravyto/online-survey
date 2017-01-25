<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RecentTemplate extends Model
{
    //
    protected $table = 'recent_template';
    public $timestamps = false;
    
    public static function createRecentTemplate ($id_template) {
        $recentTemplate = new RecentTemplate;
        
        $recentTemplate->id_template = $id_template;
        
        $recentTemplate->save();
        
        return $recentTemplate->id;
    }
    
    public static function setTemplateRefersTo($idRecentTemplate, $idTemplate) {
        DB::table('recent_template')->where('id', $idRecentTemplate)->update(['id_template' => $idTemplate]);
    }
    
    public static function getTemplateId($id) {
        return DB::table('recent_template')->where('id', $id)->pluck('id_template');
    }
    
    public static function getRecentTemplate () {
        return DB::table('recent_template')->get();
    }
    
    public static function deleteRecentTemplate ($id_recentTemplate) {
        DB::table('recent_template')->where('id', $id_recentTemplate)->delete();
    }
}
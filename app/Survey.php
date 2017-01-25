<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Survey extends Model
{
    //
    protected $table = 'survey';
    public $timestamps = false;
    
    public static function createSurvey ($name, $desc) {
        $survey = new Survey;
        
        $survey->name = $name;
        $survey->description = $desc;
        $survey->status = "Ongoing";
        
        $survey->save();
        
        return $survey->id;
    }
    
    public static function getName ($id) {
        return DB::table('survey')->where('id', $id)->pluck('name');
    }

    public static function getStatus($id) {
        return DB::table('survey')->where('id', $id)->pluck('status');
    }
    
    public static function getDescription ($id) {
        return DB::table('survey')->where('id', $id)->pluck('description');
    }
    
    public static function getAll() {
        return DB::table('survey')->get();
    }
    
    public static function getOngoing() {
        return DB::table('survey')->where('status', 'Ongoing')->get();
    }

    public static function setCompleted($id) {
        DB::table('survey')->where('id', $id)->update(['status' => 'Completed']);
    }

    public static function setOngoing($id) {
        DB::table('survey')->where('id', $id)->update(['status' => 'Ongoing']);
    }
                                        
    public static function deleteSurvey ($id) {
        DB::table('survey')->where('id', $id)->delete();
    } 
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RecentQuestion extends Model
{
    //
    protected $table = 'recent_question';
    public $timestamps = false;
    
    public static function createRecentQuestion ($id_question, $id_template) {
        $recentQuestion = new RecentQuestion;
        
        $recentQuestion->id_question = $id_question;
        $recentQuestion->id_template = $id_template;
        
        $recentQuestion->save();
    }                              
    
    public static function exists ($id_question, $id_template) {
        return DB::table('recent_question')->where('id_template', $id_template)->where('id_question', $id_question)->count();
    }
    
    public static function getQuestionId ($id_recentTemplate) {
        return DB::table('recent_question')->where('id_template', $id_recentTemplate)->get();
    }
                                        
    public static function getRecentQuestionQuestion ($id_question) {
        return Question::getQuestion ($id_question);
    }                                    
                                        
    public static function getRecentQuestionTemplate ($id_template) {
        return Question::getTemplate ($id_template);
    }
    
    public static function deleteRecentQuestion ($id_template) {
        DB::table('recent_question')->where('id_template', $id_template)->delete();
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Question extends Model
{
    //
    protected $table = 'question';
    public $timestamps = false;
    
    public static function createQuestion ($question) {
        $questions = new Question;
        
        $questions->question = $question;
        
        $questions->save();
        
        return $questions->id;
    }                        
    
    public static function getId ($question) {
        return DB::table('question')->where('question', $question)->pluck('id');
    }
                                        
    public static function getQuestion ($id) {
        return DB::table('question')->where('id', $id)->pluck('question');
    }
                                        
    public static function deleteQuestion ($id) {
        DB::table('question')->where('id', $id)->delete();
    } 
}
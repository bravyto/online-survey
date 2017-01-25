<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SavedQuestion extends Model
{
    //
    protected $table = 'saved_question';
    public $timestamps = false;
    
    public static function createSavedQuestion ($id_question, $id_template, $id_survey) {
        $savedTemplate = new SavedQuestion;
        
        $savedTemplate->id_question = $id_question;
        $savedTemplate->id_template = $id_template;
        $savedTemplate->id_survey = $id_survey;
        $savedTemplate->SM = 0;
        $savedTemplate->M = 0;
        $savedTemplate->KM = 0;
        $savedTemplate->TM = 0;
        $savedTemplate->STM = 0;
        $savedTemplate->NA = 0;
        
        $savedTemplate->save();
    }
    
    public static function getTemplateId($id_survey) {
        return DB::table('saved_question')->select('id_template')->where('id_survey', $id_survey)->get();
    }
    
    public static function getTemplateIdDistinct($id_survey) {
        return DB::table('saved_question')->select('id_template')->where('id_survey', $id_survey)->distinct()->get();
    }
    
    public static function addSM($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('SM');
    }
    
    public static function addM($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('M');
    }
    
    public static function addKM($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('KM');
    }
    
    public static function addTM($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('TM');
    }
    
    public static function addSTM($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('STM');
    }
    
    public static function addNA($id_question, $id_template, $id_survey) {
        DB::table('saved_question')->where('id_question', $id_question)->where('id_template', $id_template)->where('id_survey', $id_survey)->increment('NA');
    }
    
    public static function getQuestionId($id_survey, $id_template) {
        return DB::table('saved_question')->select('id_question')->where('id_survey', $id_survey)->where('id_template', $id_template)->get();
    }
    
    public static function getOverall($idSurvey){
        return DB::table('saved_question')->where('id_survey', $idSurvey)->get();
    }
    
    public static function getLayanan($idSurvey, $idTemplate){
        return DB::table('saved_question')->where('id_survey', $idSurvey)->where('id_template', $idTemplate)->get();
    }

    public static function deleteSavedQuestion($idSurvey){

        return DB::table('saved_question')->where('id_survey', $idSurvey)->delete();
    }
}
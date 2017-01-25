<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UsersSurvey extends Model
{
    //
    protected $table = 'users_survey';
    public $timestamps = false;
    
    public static function createUsersSurvey ($idUser, $idSurvey) {
        $survey = new UsersSurvey;
        
        $survey->id_users = $idUser;
        $survey->id_survey = $idSurvey;
        $survey->status = "Not Completed";
        
        $survey->save();
    }
    
    public static function surveyDone ($idUser) {
        DB::table('users_survey')->where('id_users', $idUser)->update(['status' => 'Completed']);
    }
    
    public static function getStatus ($idUser) {
        return DB::table('users_survey')->where('id_users', $idUser)->pluck('status');
    }
    
    public static function getUsers ($idSurvey) {
        return DB::table('users_survey')->select('id_users')->where('id_survey', $idSurvey)->get();
    }
    
    public static function countTotal($idSurvey) {
        return DB::table('users_survey')->where('id_survey', $idSurvey)->count();
    }
    
    public static function countTotalCompleted($idSurvey) {
        return DB::table('users_survey')->where('id_survey', $idSurvey)->where('status', 'Completed')->count();
    }

    public static function getSurvey ($idUser) {
       return DB::table('users_survey')->where('id_users', $idUser)->pluck('id_survey');
    }

    public static function deleteUsersSurvey($idSurvey){

        return DB::table('users_survey')->where('id_survey', $idSurvey)->delete();
    }

    public static function getIDUser($idSurvey){

        return DB::table('users_survey')->select('id_users')->where('id_survey', $idSurvey)->get();
    }
}
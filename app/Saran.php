<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Saran extends Model
{
    //
    protected $table = 'saran';
    public $timestamps = false;
    
    public static function createSaran ($id_template, $sarannya, $id_survey) {
        $saran = new Saran;
        
        $saran->id_template = $id_template;
        $saran->saran = $sarannya;
        $saran->id_survey = $id_survey;
        
        $saran->save();
    }  

    public static function getSaran ($id_template, $id_survey) {
        return DB::table('saran')->where('id_template', $id_template)->where('id_survey', $id_survey)->get();
    }

    public static function deleteSaran($idSurvey){

        return DB::table('saran')->where('id_survey', $idSurvey)->delete();
    }
}
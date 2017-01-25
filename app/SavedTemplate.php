<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SavedTemplate extends Model
{
    //
    protected $table = 'saved_template';
    public $timestamps = false;
    
    public static function createSavedTemplate ($id_template, $id_survey) {
        $savedTemplate = new SavedTemplate;
        
        $savedTemplate->id_template = $id_template;
        $savedTemplate->id_survey = $id_survey;
        
        $savedTemplate->save();
    }
    
    public static function deleteSavedTemplate ($id_survey) {
        DB::table('saved_template')->where('id_survey', $id_survey)->delete();
    }
}
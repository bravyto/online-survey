<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Template extends Model
{
    //
    protected $table = 'template';
    public $timestamps = false;
    
    public static function createTemplate ($name, $description) {
        $template = new Template;
        
        $template->name = $name;
        $template->description = $description;
        
        $template->save();
        
        return $template->id;
    }                        
    
    public static function getId ($name, $description) {
        return DB::table('template')->where('name', $name)->where('description', $description)->pluck('id');
    }                                     
                                        
    public static function getName ($id) {
        return DB::table('template')->where('id', $id)->pluck('name');;
    }                                   
                                        
    public static function getDescription ($id) {
        return DB::table('template')->where('id', $id)->pluck('description');;
    }
                                        
    public static function deleteTemplate ($id) {
        DB::table('template')->where('id', $id)->delete();
    } 
}
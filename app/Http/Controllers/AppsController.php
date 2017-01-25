<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Survey;
use Input;
use App\SavedQuestion;
use App\Question;
use App\Template;
use App\UsersSurvey;
use App\Saran;

class AppsController extends Controller{
    //

    public function webapps(){

    	if(Auth::check()){
            $id_user = Auth::User()->id;
            $id_survey = UsersSurvey::getSurvey($id_user);
            
            if (Survey::getStatus($id_survey) == "Ongoing") {
            if (UsersSurvey::getStatus($id_user) == "Not Completed") {
            $name = Survey::getName($id_survey);
            $desc = Survey::getDescription($id_survey);
                
            $templates = SavedQuestion::getTemplateIdDistinct($id_survey);
            
            $data = array();
            
            foreach($templates as $template) {
                $id_template = $template->id_template;
                $questions = SavedQuestion::getQuestionId($id_survey, $id_template);
                
                $datanya = array();
                
                foreach ($questions as $question) {
                    array_push($datanya, Question::getQuestion($question->id_question));
                }
                
                array_push($data, [ 'name' => Template::getName($id_template), 'description' => Template::getDescription($id_template), 'data' => $datanya ]);
            }

            
    		return view('apps/webapps')->with('data', $data)->with('name', $name)->with('desc', $desc)->with('id', $id_survey);
            } else {
                return redirect('auth/login')->with('loginError', 'You have filled this survey');
            }
            } else {
                return redirect('auth/login')->with('loginError', 'Survey has ended');

            }    
    	}

    	return redirect('auth/login')->with('loginError', 'Please login first!');
    }
    
    public function submitSurvey() {
        if(Auth::check()){

            $id_survey = Input::get('id');
            $id_user = Auth::user()->id;
            $saran = Input::get('saran');
            $recentYear = date('Y');
            $name = Input::get('name');
            
            $templates = SavedQuestion::getTemplateIdDistinct($id_survey);
            
            
            foreach($templates as $index1 => $template) {
                $id_template = $template->id_template;
                $questions = SavedQuestion::getQuestionId($id_survey, $id_template);
                
                foreach ($questions as $index2 => $question) {
                    $hasil = Input::get('optionsRadios'.$index1.'_'.$index2);
                    if($hasil == 5) {
                        SavedQuestion::addSM($question->id_question, $id_template, $id_survey);
                    } else if($hasil == 4) {
                        SavedQuestion::addM($question->id_question, $id_template, $id_survey);
                    } else if($hasil == 3) {
                        SavedQuestion::addKM($question->id_question, $id_template, $id_survey);
                    } else if($hasil == 2) {
                        SavedQuestion::addTM($question->id_question, $id_template, $id_survey);
                    } else if($hasil == 1) {
                        SavedQuestion::addSTM($question->id_question, $id_template, $id_survey);
                    } else if($hasil == 0) {
                        SavedQuestion::addNA($question->id_question, $id_template, $id_survey);
                    } 
                }
                
                if($saran[$index1] != NULL){
                    Saran::createSaran($id_template, $saran[$index1], $id_survey);
                }
            }
            UsersSurvey::surveyDone($id_user);
            if (UsersSurvey::countTotal($id_survey) == UsersSurvey::countTotalCompleted($id_survey)) {
                Survey::setCompleted($id_survey);
            }

            return view('apps/goodbye')
            ->with('year', $recentYear)
            ->with('name', $name);
    		// return redirect('auth/login')->with('successMsg', 'Thanks for your participation!');
    	}

    	return redirect('auth/login')->with('loginError', 'Please login first!');
    }
}

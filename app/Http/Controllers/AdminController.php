<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth, Input, App\RecentTemplate, App\Template, App\RecentQuestion, App\Question;
use App\User, App\UsersSurvey, App\Survey, App\SavedQuestion, App\Saran;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderRequestTwo;
use App\GroupIndex;

class AdminController extends Controller{
    
    public function dashboard(){

    	if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            $surveys = Survey::getAll();
                        
            $data = array();
            
            foreach($surveys as $survey) {
                $total = UsersSurvey::countTotal($survey->id);
                $totalCompleted = UsersSurvey::countTotalCompleted($survey->id);
                array_push($data, [ 'id' => $survey->id, 'name' => $survey->name, 'description' => $survey->description, 'status' => $survey->status, 'total' => $total, 'totalCompleted' => $totalCompleted ]);
            }
            
    		return view('admin/pages/dashboard')
                ->with('dashboard', 'active')
                ->with('layanan', '')
                ->with('pengguna', '')
                ->with('ubah_password', '')
                ->with('data', $data);
    	} else {

    	   return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }
    
    public function strrevpos($instr, $needle) {
        $rev_pos = strpos (strrev($instr), strrev($needle));
        if ($rev_pos===false) return false;
        else return strlen($instr) - $rev_pos - strlen($needle);
    }

    public function edit_respondent(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){
                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
            
            $idSurvey = Input::get('id');
            
            $idUsers = UsersSurvey::getUsers($idSurvey);
            
            $group = [];
            
            foreach($idUsers as $idUser) {
                $groupName = substr(User::getUsername($idUser->id_users), 0, AdminController::strrevpos(User::getUsername($idUser->id_users), '_'));
		    $row = -1;
                //$row = array_search($groupName, array_column($group, 'groupName')); 
		    foreach($group as $index => $groups) {
		        if($groupName == $groups['groupName']) 
			      $row = $index;	
		    } 
                if ($row > -1) {
                    $group[$row]['total']++;
                } else {
                    array_push($group, [ 'groupName' => $groupName , 'total' => 1 ]);
                }             
            }
            
            return view('admin/pages/edit-respondent')
                ->with('dashboard', 'active')
                ->with('layanan', '')
                ->with('pengguna', '')
                ->with('group', $group)
                ->with('ubah_password', '')
                ->with('id', $idSurvey);
        } else {

           return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }
    
    public function edit_respondent_p(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){
                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
            
            $idSurvey = Input::get('idSurvey');
            $idUsers = UsersSurvey::getUsers($idSurvey);
            $codename = Input::get('codenamebefore');
            $jumlahbefore = Input::get('jumlahbefore');
            
            $group = [];
            
            $change = false;

            foreach($idUsers as $idUser) {
                $groupName = substr(User::getUsername($idUser->id_users), 0, AdminController::strrevpos(User::getUsername($idUser->id_users), '_'));
		    $row = -1;
                //$row = array_search($groupName, array_column($group, 'groupName')); 
		    foreach($group as $index => $groups) {
		        if($groupName == $groups['groupName']) 
			      $row = $index;	
		    } 
                if ($row > -1) {
                    $group[$row]['total']++;
                } else {
                    array_push($group, [ 'groupName' => $groupName , 'total' => 1 ]);
                }             
            }
            
            foreach($codename as $index => $groupName) {
		    $row = -1;
                //$row = array_search($groupName, array_column($group, 'groupName')); 
		    foreach($group as $index => $groups) {
		        if($groupName == $groups['groupName']) 
			      $row = $index;	
		    } 
                if ($group[$row]['total'] < $jumlahbefore[$index]) {
                    for($i = $group[$row]['total']; $i < $jumlahbefore[$index]; $i++) {
                        $indexGroup = GroupIndex::addIndex($groupName);
                        $idUser = User::createUsers($groupName."_".($indexGroup), "mandiri".($indexGroup), 'pegawai');
                        UsersSurvey::createUsersSurvey($idUser, $idSurvey);
                    }
                    $change = true; 
                }    
            }
            
            

            $codenames = Input::get('codename');
            $jumlah = Input::get('jumlah');
                       
            if($codenames != NULL)
            foreach($codenames as $index => $codename) {
                if($codename != NULL) {
                    $change = true; 
                    for($i = 0; $i < $jumlah[$index]; $i++) {
                        $indexGroupnya = GroupIndex::addIndex($codename);
                        $idUser = User::createUsers($codename."_".($indexGroupnya), "mandiri".($indexGroupnya), 'pegawai');
                        UsersSurvey::createUsersSurvey($idUser, $idSurvey);
                    }
                }
            }

            if ($change) {
                Survey::setOngoing($idSurvey);
            }

            return redirect('admin/pages/dashboard');
                        
        } else {

           return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function surveystop() {
        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
            
            $idSurvey = Input::get('id');

            Survey::setCompleted($idSurvey);

            return redirect('admin/pages/dashboard');
            
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function surveydelete(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
            
            $idSurvey = Input::get("id");

            $idUsers = UsersSurvey::getIDUser($idSurvey);

            foreach ($idUsers as $idUser) {
                
                User::deleteUsers($idUser->id_users);
            }

            UsersSurvey::deleteUsersSurvey($idSurvey);
            Survey::deleteSurvey($idSurvey);
            SavedQuestion::deleteSavedQuestion($idSurvey);
            Saran::deleteSaran($idSurvey);

            return redirect('admin/pages/dashboard');
            
        } 

        else {

            return redirect('auth/login')->with('loginError', 'Please login first!');
        }        
    }

    public function surveydetail(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
            
            $idSurvey = Input::get('id');
            $surveyName = Survey::getName($idSurvey);
            $surveyDescription = Survey::getDescription($idSurvey);
            
            $surveyOveralls = SavedQuestion::getOverall($idSurvey);
            
            $overall = [ 'SM' => 0, 'M' => 0, 'KM' => 0, 'TM' => 0, 'STM' => 0, 'NA' => 0 ];
            
            foreach ($surveyOveralls as $surveyOveral) {
                $overall = [ 'SM' => $overall['SM'] + $surveyOveral->SM, 
                             'M' => $overall['M'] + $surveyOveral->M, 
                             'KM' => $overall['KM'] + $surveyOveral->KM,
                             'TM' => $overall['TM'] + $surveyOveral->TM,
                             'STM' => $overall['STM'] + $surveyOveral->STM,
                             'NA' => $overall['NA'] + $surveyOveral->NA];
            }
            
                
            $templates = SavedQuestion::getTemplateIdDistinct($idSurvey);
            
            $layanan = array();
            
            foreach($templates as $template) {
                $id_template = $template->id_template;
                $surveyLayanans = SavedQuestion::getLayanan($idSurvey, $id_template);
                
                $datanya = [ 'SM' => 0, 'M' => 0, 'KM' => 0, 'TM' => 0, 'STM' => 0, 'NA' => 0 ];
                
                $dataQuestion = array();
            
                foreach ($surveyLayanans as $surveyLayanan) {
                    $datanya = [ 'SM' => $datanya['SM'] + $surveyLayanan->SM, 
                             'M' => $datanya['M'] + $surveyLayanan->M, 
                             'KM' => $datanya['KM'] + $surveyLayanan->KM,
                             'TM' => $datanya['TM'] + $surveyLayanan->TM,
                             'STM' => $datanya['STM'] + $surveyLayanan->STM,
                             'NA' => $datanya['NA'] + $surveyLayanan->NA];
                    array_push($dataQuestion, 
                        [    'name' => Question::getQuestion($surveyLayanan->id_question),
                             'SM' => $surveyLayanan->SM, 
                             'M' => $surveyLayanan->M, 
                             'KM' => $surveyLayanan->KM,
                             'TM' => $surveyLayanan->TM,
                             'STM' => $surveyLayanan->STM,
                             'NA' => $surveyLayanan->NA ]
                    );
                }
                
                $saran = Saran::getSaran($id_template, $idSurvey);
                array_push($layanan, [ 'name' => Template::getName($id_template), 'description' => Template::getDescription($id_template), 'data' => $datanya, 'dataQuestion' => $dataQuestion, 'saran' => $saran ]);
            }
            
            return view('admin/pages/surveydetail')
                ->with('dashboard', 'active')
                ->with('layanan', '')
                ->with('pengguna', 'active')
                ->with('surveyName', $surveyName)
                ->with('surveyDescription', $surveyDescription)
                ->with('overall', $overall)
                ->with('ubah_password', '')
                ->with('layananScore', $layanan);
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function pengguna(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            $idSurvey   = Input::get("id");
            $usersSurvey = UsersSurvey::getUsers($idSurvey);
            $data = array();

            foreach ($usersSurvey as $userSurvey) {
                   
                array_push($data, [ 'username' => User::getUsername($userSurvey->id_users), 'status' => UsersSurvey::getStatus($userSurvey->id_users) ]);
            }

            return view('admin/pages/pengguna')
                ->with('dashboard', 'active')
                ->with('layanan', '')
                ->with('pengguna', '')
                ->with('ubah_password', '')
                ->with('accountList', $data);
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            $listTemplate = RecentTemplate::getRecentTemplate();
            $listLayanan = array();
            $listLayananName = array();
            foreach ($listTemplate as $data) {
                array_push($listLayanan, $data->id);
                array_push($listLayananName, Template::getName($data->id_template));
            }
            return view('admin/pages/layanan')
                ->with('dashboard', '')
                ->with('layanan', 'active')
                ->with('pengguna', '')
                ->with('listLayanan', $listLayanan)
                ->with('ubah_password', '')
                ->with('listLayananName', $listLayananName);
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan_post(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            $id_recentTemplate = Input::get('id');
            
            $id_template = RecentTemplate::getTemplateId($id_recentTemplate);
            $name = Template::getName($id_template);
            $desc = Template::getDescription($id_template);
            
            $question = array();
            
            $questions = RecentQuestion::getQuestionId($id_recentTemplate);
            
            foreach ($questions as $data) {
                array_push($question, Question::getQuestion($data->id_question));
            }
            
            return view('admin/pages/layanan-detail')
                ->with('dashboard', '')
                ->with('layanan', 'active')
                ->with('pengguna', '')
                ->with('id', $id_recentTemplate)
                ->with('name', $name)
                ->with('desc', $desc)
                ->with('ubah_password', '')
                ->with('question', $question);
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan_detail_p(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }            
            
            $id = Input::get("id");
            $name = Input::get("layanan");
            $description = Input::get("deskripsi");
            $questions = Input::get("question");
            
            $idTemplate = RecentTemplate::getTemplateId($id);
            
            $recentName = Template::getName($idTemplate);
            $recentDesc = Template::getDescription($idTemplate);
            
            RecentQuestion::deleteRecentQuestion($id);
            
            if ($name == $recentName && $description == $recentDesc) {
                $idTemplate = $idTemplate;
            } else {
                $idTemplate = Template::createTemplate($name, $description);
            }
            
            RecentTemplate::setTemplateRefersTo($id, $idTemplate);
            
            if ($questions != NULL) {
            foreach ($questions as $question) {
                if($question != NULL) {
                $idQuestion = Question::getId($question);
                if ($idQuestion != NULL) {
                    RecentQuestion::createRecentQuestion($idQuestion, $id);
                } else {
                    $idQuestion = Question::createQuestion($question);
                    RecentQuestion::createRecentQuestion($idQuestion, $id);
                }
                }
            }
            }
            
            return redirect('admin/pages/layanan');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan_detail_r(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }


            return view('admin/pages/layanan-detail')
                ->with('dashboard', '')
                ->with('layanan', 'active')
                ->with('ubah_password', '')
                ->with('pengguna', '');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan_create(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }


            return view('admin/pages/layanan-create')
                ->with('dashboard', '')
                ->with('layanan', 'active')
                ->with('ubah_password', '')
                ->with('pengguna', '');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function layanan_create_p(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
 
            $name = Input::get("layanan");
            $description = Input::get("deskripsi");
            $questions = Input::get("question");
            
            $id_template = Template::getId($name, $description);
            if ($id_template == NULL) {
                $id_template = Template::createTemplate($name, $description);
            }
            
            $id_recentTemplate = RecentTemplate::createRecentTemplate($id_template);
            
            if ($questions != NULL) {
            foreach ($questions as $question) {
                if ($question != NULL) {
                    $id_question = Question::getId($question);
                    if ($id_question == NULL) {
                        $id_question = Question::createQuestion($question);
                    }
                    RecentQuestion::createRecentQuestion($id_question, $id_recentTemplate);
                }
            }
            }
            
            return redirect('admin/pages/layanan');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }
    
    public static function layanan_delete(){
        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }
 
            $id = Input::get("id");
            
            RecentTemplate::deleteRecentTemplate($id);
            RecentQuestion::deleteRecentQuestion($id);
            
            return redirect('admin/pages/layanan');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function start_survey(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            return view('admin/pages/start-survey')
                ->with('dashboard', '')
                ->with('layanan', 'active')
                ->with('ubah_password', '')
                ->with('pengguna', '');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function start_survey_p(OrderRequestTwo $request){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            $name = Input::get("nama");
            $deskripsiUmum = Input::get("deskripsi");
            $codenames = Input::get("codename");
            $jumlah = Input::get("jumlah");
            
            print_r($jumlah);
            
            $id = Survey::createSurvey($name, $deskripsiUmum);
            
            foreach($codenames as $index => $codename) {
                if($codename != NULL) {
                for($i = 0; $i < $jumlah[$index]; $i++) {
                    $indexnya = GroupIndex::addIndex($codename);
                    $idUser = User::createUsers($codename."_".($indexnya), "mandiri".($indexnya), 'pegawai');
                    UsersSurvey::createUsersSurvey($idUser, $id);
                }
                }
            }
            
            $layanans = RecentTemplate::getRecentTemplate();
            
            foreach($layanans as $layanan) {
                $questions = RecentQuestion::getQuestionId($layanan->id);
                foreach($questions as $question) {
                    SavedQuestion::createSavedQuestion($question->id_question, $layanan->id_template, $id);
                }
            }

            return redirect('admin/pages/layanan');
        } else {

        return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function edit_password(){

        if(Auth::check()){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role != "admin"){

                return redirect('auth/login')->with('loginError', 'You dont have privilege to access!');
            }

            return view('admin/pages/edit-password')
                ->with('dashboard', '')
                ->with('layanan', '')
                ->with('ubah_password', 'active')
                ->with('pengguna', '');
        } 

        else {

            return redirect('auth/login')->with('loginError', 'Please login first!');
        }
    }

    public function edit_password_p(){

        $id = Auth::user()->id;
        $password = strval(Input::get('password'));
        $conf_password = strval(Input::get('conf_password'));

        $user = array(
            'username' => "admin",
            'password' => strval(Input::get("old_password"))
        );

        if(!Auth::attempt($user)){

            return redirect('admin/pages/edit-password')
                ->with('inputError', 'Your old password is wrong!');
        }

        if($password != $conf_password){

            return redirect('admin/pages/edit-password')
                ->with('inputError', 'Your confirmation password didnt match your password!');
        }

        else {

            User::updatePassword($id, $password);
            Auth::logout();

            return redirect('auth/login')
                ->with('successMsg', 'Your password has been changed.');
        }
    }   
}


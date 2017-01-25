<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequestTwo extends Request {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(){
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(){
    // $rules = [
    //   'name' => 'required|max:255',
    // ];

    foreach($this->request->get('codename') as $key => $val){

      $rules['codename.'.$key] = 'required';
    }

    foreach($this->request->get('jumlah') as $key => $val){

      $rules['jumlah.'.$key] = 'required';
    }

    return $rules;
  }

  public function messages(){

    $messages = [];
    
    foreach($this->request->get('codename') as $key => $val){

      $messages['codename.'.$key.'.required'] = 'The Group Name field is required';
    }

    foreach($this->request->get('jumlah') as $key => $val){

      $messages['jumlah.'.$key.'.required'] = 'The Number Of Respondent field is required';
    }

    return $messages;
  }

}

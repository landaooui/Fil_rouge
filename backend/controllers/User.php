<?php
class User extends Controller {
    public function __construct(){
     
      $this->userModel = $this->model('UserModel'); 
    }


    public function login(){
      // Check for POST

      $user = $this->userModel->findUserByEmail($this->data->email);
      
    //  die(print_r($user));
        if ($user) { 

             if(password_verify($this->data->password,$user->password)){
               unset($user->password);
               unset($user->id);
                 echo json_encode(array("message"=>"todos buenes","user"=>$user));
             }else{
                echo json_encode(array("message"=>"nada buenes"));
             }
                
    }else{
       echo json_encode(array("message"=>"nada user"));
    }
    }


      

      
      

  
  }
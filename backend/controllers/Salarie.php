<?php
class Salarie extends Controller{
       
public function __construct()
{
     $this->salariemodel =$this->model('SalarieModel');
}
//     public function add(){

//     if($_SERVER['REQUEST_METHOD'] == 'POST'){
//         // Sanitize POST array
//         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//         // die(print_r($this->data)) ;
//          $this->data->password=password_hash($this->data->password ,PASSWORD_DEFAULT);
//         if($salarie =$this->salariemodel->addSalarie($this->data)){
//                 print_r(json_encode($salarie));
//         }
// }
// }
public function add()
    {

        $headers = apache_request_headers();
        $headers = isset($headers['Authorization']) ? explode(' ', $headers['Authorization']) : null;
        if ($headers) {
            try {
                $infos = $this->verifyAuth($headers[1]);
                if ($infos->role == "Admin") {
                    $salarie =$this->salariemodel->addSalarie($this->data);
                    if ($salarie) {
                        print_r(json_encode(array(
                            "message" => "salarie Created with success 💥",
                        )));
                    }
                } else {
                    print_r(json_encode(array(
                        'error' => "You Don't Have Permition to make this action 💢 ",
                    )));
                    die();
                }
            } catch (\Throwable $th) {
                print_r(json_encode(array(
                    'error' => "Authentication error 1💢 ",
                )));
            }
        } else {
            print_r(json_encode(array(
                'error' => "Authentication error 2💢 ",
            )));
        }
    }

    public function login(){
      // Check for POST

      $salarie = $this->salariemodel->findUserByEmail($this->data->email);
      
    //  die(print_r($user));
        if ($salarie) { 
             if(password_verify($this->data->password,$salarie->password)){
               unset($salarie->password);
               unset($salarie->id_s);
            //    die($this->auth($salarie->specialiste));
                 echo json_encode(array("message"=>"todos buenes",'token'=>$this->auth($salarie->specialiste),"user"=>$salarie));
             }else{
                echo json_encode(array("message"=>"nada buenes"));
             }
                
    }else{
       echo json_encode(array("message"=>"nada user"));
    }
    }
}
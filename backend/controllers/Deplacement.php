<?php
class Deplacement extends Controller{
      
public function __construct()
{
     $this->depmodel =$this->model('DepModel');
}
    public function add(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //  print_r($this->data);
       
        if($this->depmodel->addDeplacement($this->data)){
            // redirect('flights/dashboard');
                echo "add ";
        }
}
}
}

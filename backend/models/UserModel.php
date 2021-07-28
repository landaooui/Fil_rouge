<?php

class UserModel{
    private $db ;


    public function __construct()
    {
        $this->db =new DB ;
    }
   // Login User
    public function login($datal){
      $this->db->query('SELECT * FROM salarie WHERE email = :email');
      $this->db->bind(':email',$this->data->email);
      $row = $this->db->single();
      if(password_verify($this->data->password,$row->Password)){
          
        return $row;
        
      } else {
        return false;
     
      }
    } 

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM salarie WHERE email =:email');
        $this->db->bind(':email',$email);
        $row =$this->db->single();
    
        //chck row
        if ($this->db->rowCount()>0){
            return $row ;
        } else {
        return false ;
        }
    }
}
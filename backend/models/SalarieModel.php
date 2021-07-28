<?php 
class  SalarieModel{
    private $db ;

    public function __construct()
    {
        $this->db =new DB();
    }

    public function getSalarie(){
        $this->db ->query('SELECT * FROM salarie ');
        $result =$this->db->all();
        return $result ; 
    }

    public function addSalarie($data){
      $this->db->query('INSERT INTO Salarie(nom,prenom,genre,photo,email,password,specialiste) VALUES (:nom,:prenom,:genre,:photo,:email,:password,:specialiste)');
      // Bind values
      $this->db->bind(':nom', $data->nom);
      $this->db->bind(':prenom', $data->prenom);
      $this->db->bind(':genre', $data->genre);
      $this->db->bind(':photo', $data->photo);
      $this->db->bind(':email', $data->email);
      $this->db->bind(':password', $data->password);
      $this->db->bind(':specialiste', $data->specialiste);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function login($data){
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

     public function deleteSalarie($id){
      $this->db->query('DELETE FROM salarie WHERE id_s=:id');
      $this->db->bind(':id' ,$id);
       // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
}
       public function editsalarie($data,$id){
      $this->db->query('UPDATE salarie SET  :nom,:prenom,:genre,:photo,:email,:password,:specialist WHERE id_s=:id');
      // Bind values
      $this->db->bind(':nom', $data->nom);
      $this->db->bind(':prenom', $data->prenom);
      $this->db->bind(':genre', $data->genre);
      $this->db->bind(':photo', $data->photo);
      $this->db->bind(':email', $data->email);
      $this->db->bind(':password', $data->password);
      $this->db->bind(':specialiste', $data->specialiste);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}
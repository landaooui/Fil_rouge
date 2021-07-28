<?php 
class  DepModel{
    private $db ;

    public function __construct()
    {
        $this->db =new DB();
    }

    public function getDeplacement(){
        $this->db ->query('SELECT * FROM deplacement ');
        $result =$this->db->all();
        return $result ; 
    }

    public function addDeplacement($data){
      $this->db->query('INSERT INTO deplacement ( nom,description,destination,date_debut,date_fin) VALUES (:nom,:description,:destination,:date_debut,:date_fin)');
      // Bind values
      $this->db->bind(':nom', $data->nom);
      $this->db->bind(':description', $data->description);
      $this->db->bind(':destination', $data->destination);
      $this->db->bind(':date_debut', $data->date_debut);
      $this->db->bind(':date_fin', $data->date_fin);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
     
    // public function updateflight($data){
    //   $this->db->query('UPDATE vol  SET  LieuDepart=:LieuDepart,LieuArrive=:LieuArrive,DateDepart=:DateDepart,DateArrive=:DateArrive,NBR_place=:NBR_place,Prix=:Prix WHERE ID_VOL=:ID_VOL');
    //   // Bind values
    //   $this->db->bind(':ID_VOL', $data['ID_VOL']);
    //   $this->db->bind(':LieuDepart', $data['LieuDepart']);
    //   $this->db->bind(':LieuArrive', $data['LieuArrive']);
    //   $this->db->bind(':DateDepart', $data['DateDepart']);
    //   $this->db->bind(':DateArrive', $data['DateArrive']);
    //   $this->db->bind(':NBR_place', $data['NBR_place']);
    //   $this->db->bind(':Prix', $data['Prix']);

    //   // Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // public function deleteFlight($id){
    //   $this->db->query('DELETE FROM vol WHERE ID_VOL=:ID_VOL');
    //   $this->db->bind(':ID_VOL' , $id);

    //    // Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }

    // } 



    // function getFlightById($id){
    //     $this->db->query( 'SELECT * FROM vol WHERE ID_VOL =:ID_VOL');
    //     $this->db->bind(':ID_VOL' , $id);

    //    $row =$this->db->single();

    //    return $row; 

    // }
    //   function getFlightbyDest($data){
    //     $this->db->query( 'SELECT * FROM vol WHERE LieuDepart =:LieuDepart AND LieuArrive =:LieuArrive AND NBR_place>=:passengers+1 ');
    //     $this->db->bind(':LieuDepart' ,$data['LieuDepart']);
    //     $this->db->bind(':LieuArrive' ,$data['LieuArrive']);
    //     $this->db->bind(':passengers' ,$data['passengers']);

    //    $row =$this->db->resultSet();
    //    return $row; 

    // }
    

  }

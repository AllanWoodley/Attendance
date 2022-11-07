<?php

class crud{
    private $db;

    function __construct($conn){
    $this -> db = $conn;
    }

    public function insert($firstname,$lastname,$dateOfBirth,$specialtyID,$email,$num){
        try{
            //INSERT INTO `attendees`(`attendeeID`, `firstname`, `lastname`, `dateOfBirth`, `specialtyID`, `email`, `number`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
            $sql = "INSERT INTO attendees(firstname,lastname,dateOfbirth,specialtyID,email,num) VALUES(:fname,:lname,:dob,:spec,:eml,:num)";
            $stmt = $this -> db -> prepare($sql);  
            
            $stmt ->bindparam(":fname",$firstname);
            $stmt ->bindparam(":lname",$lastname);
            $stmt ->bindparam(":dob",$dateOfBirth);
            $stmt ->bindparam(":spec",$specialtyID);
            $stmt ->bindparam(":eml",$email);
            $stmt ->bindparam(":num",$num);

            $stmt -> execute();
            return true;
        }
        catch(PDOException $e){ 
            echo $e ->getMessage();
            return false;
        }
    }

    public function getAttendees(){
       try{
        // $sql = "SELECT * FROM `attendees`";
        $sql = "SELECT * FROM `attendees` a INNER JOIN specialty s on a.specialtyID = s.specialtyID";
        $results = $this ->db ->query($sql); 
        return $results;
         }
       catch(PDOException $e){
            echo $e->getMessage();
            return false;
       }
    }

    public function getSpecialties(){
        try{
            $sql = "SELECT * FROM `specialty`";
            $results = $this ->db ->query($sql); 
        return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
        return false;
    }
    }

   public function getAttendeeDetails($id){
    try{
        $sql = 'select * from attendees where attendeeID = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
   }

   public function editAttendee($id,$firstname,$lastname,$dateOfBirth,$specialtyID,$email,$num){
        try{
            $sql = "UPDATE `attendees` SET `firstname`=:firstname,`lastname`=:lastname,`dateOfBirth`=:dob,
            `specialtyID`=:specialtyID,`email`=:email,`num`=:num WHERE attendeeID = :id";
            $stmt = $this -> db -> prepare($sql);    
            $stmt ->bindparam(':id',$id);
            $stmt ->bindparam(':firstname',$firstname);
            $stmt ->bindparam(':lastname',$lastname);
            $stmt ->bindparam(':dob',$dateOfBirth);
            $stmt ->bindparam(':specialtyID',$specialtyID);
            $stmt ->bindparam(':email',$email);
            $stmt ->bindparam(':num',$num);

            $stmt -> execute();
            return true;
        }catch(PDOException $e){
        echo $e->getMessage();
        return false;
        }
   }

    public function deleteAttendee($id){
        try{
        $sql = "delete from attendees where attendeeID = :id";
        $stmt = $this ->db ->prepare($sql); 
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

 

}

?>
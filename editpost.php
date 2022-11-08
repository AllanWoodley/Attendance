<?php 
require_once "db/conn.php";


if(isset($_POST["re-submit"])){
        $id = $_POST["id"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dateOfBirth = $_POST["dateOfBirth"];
        $specialtyID = $_POST["specialtyID"];
        $email = $_POST["email"];
        $num = $_POST["num"];

        $result = $crud->editAttendee($id,$firstname,$lastname,$dateOfBirth,$specialtyID,$email,$num);
            if($result){
                header("Location: viewrecords.php");
            }

    }
    else{
        include 'includes/errormessage.php';
    }

?>
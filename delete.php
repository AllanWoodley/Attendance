<?php
    $title = "View Record";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!$_GET['id']){
        include 'includes/errormessage.php';
        echo 'error';
    }else{
        $id = $_GET['id'];

        $result = $crud->deleteAttendee($id);
        if($result){
            header("location: viewrecords.php");
            include 'includes/successmessage.php';
        }
        else{
            echo '';
        }
    }
?>

<br>
<?php require_once 'includes/footer.php';?>
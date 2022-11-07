<?php 
$title = "success";
require_once "includes/header.php"; 
require_once "db/conn.php";


if(isset($_POST["submit"])){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $spec = $_POST["specialtyID"];
    $eml = $_POST["email"];
    $num = $_POST["number"];

    $isSuccess = $crud->insert($fname,$lname,$dob,$spec,$eml,$num);
    if($isSuccess){
        //<h1 class="text-center text-success"> You have been registered </h1>
       // echo '<h1 class="text-center text-success"> You have been registered </h1>';
        include 'includes/successmessage.php';
    }
    else{
        // echo '<h1 class="text-center text-danger"> error in processing </h1>';
        include 'includes/errormessage.php';
    }

  }
  ?>


<!--  //using $_POST as action to submit button-->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">        
        <?php  echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialtyID']; ?></h6>
    <p class="card-text">Date of Birth:<?php echo $_POST['dob']; ?></p>
    <p class="card-text">Email:<?php echo $_POST['email']; ?></p>
    <p class="card-text">Contact:<?php echo $_POST['number']; ?></p>

  </div>
</div>



<?php
//echo $_POST['firstName'];
//echo $_POST['lastName'];
//echo $_POST['dob'];
//echo $_POST['specialty'];
//echo $_POST['email'];
//echo $_POST['number'];
?>

<br/>
<a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View</a>
<a href="edit.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">edit</a>
<a href="delete.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">delete</a>
<br>
<?php require_once 'includes/footer.php';?>


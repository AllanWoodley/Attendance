<?php 
$title = "View Record";
require_once "includes/header.php"; 
require_once "db/conn.php";
//$results = $crud->getSpecialties();
//$results = $crud -> getAttendees();


if(!isset($_GET['id'])){
    header("Location:viewrecords.php");
    //echo"<h1 class='text-danger'>Please check details and try again</h1>";
}else{
    $id = $_GET['id'];
    $results = $crud->getAttendeeDetails($id);

?>
<?php  $results ->fetch(PDO::FETCH_ASSOC); ?>
    
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name:        
    <?php  echo $results['firstname'] . ' ' . $results['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $results['specialtyID']; ?></h6>
    <p class="card-text">Date of Birth:<?php echo $results['dateOfBirth']; ?></p>
    <p class="card-text">Email:<?php echo $results['email']; ?></p>
    <p class="card-text">Contact:<?php echo $results['num']; ?></p>                    

  </div>
</div>

<?php }?>


<a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View</a>
<a href="edit.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">edit</a>
<a href="delete.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">delete</a>
<br>
<?php require_once 'includes/footer.php';?>
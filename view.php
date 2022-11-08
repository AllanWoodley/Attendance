<?php
    $title = "View Record";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    }
    else{
        include 'includes/errormessage.php';
    }
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">        
        <?php  echo $result['firstname'] . ' ' . $result['lastname']; ?>
    </h5>
    <p class="card-text">Date of Birth: <?php echo $result['dateOfBirth']; ?></p>
    <p class="card-text">Email: <?php echo $result['email']; ?></p>
    <p class="card-text">Contact: <?php echo $result['num']; ?></p>

  </div>
</div>


<br/>
<a href="viewrecords.php" class="btn btn-primary">Back to list</a>

<br>
<?php require_once 'includes/footer.php';?>
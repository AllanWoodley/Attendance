<?php
    $title = "View Record";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud -> getAttendees();

    isset($_GET['id']);
        $id = $_GET['id'];
        $results = $crud->getAttendeeDetails($id);

?>


       
    <?php $r = $results ->fetch(PDO::FETCH_ASSOC) ?>
    <?php ?>   

  <div class="card" style="width: 18rem;">
  <div class="card-header">
    ATTENDEE    #   <?php echo $r['attendeeID']?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name: <?php echo $r['firstname'] . ' ' . $r['lastname']?></li>
    <li class="list-group-item">DOB:    <?php echo $r['dateOfBirth']?></li>
    <li class="list-group-item">Specialty:  <?php echo $r['name']?></li>  <!--reference name from specialty table instead of specialty id-->
    <li class="list-group-item">Email:  <?php echo $r['email']; ?></li>
    <li class="list-group-item">Contact #:  <?php echo $r['num']; ?></li>
  </ul>
</div>

<br/>
<a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View</a>
<a href="edit.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">edit</a>
<a href="delete.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">delete</a>
<br>
<?php require_once 'includes/footer.php';?>
<?php
    $title = "View All Record";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud -> getAttendees();
?>

<table class = "table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
       <!-- <th>Date of Birth</th>-->
        <th>Specialty</th>
        <!--<th>Email</th>
        <th>Phone #</th>-->
        <th>Actions</th>
    </tr>
    <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>

        <tr>
            <td><?php echo $r['attendeeID']?></td>
            <td><?php echo $r['firstname']?></td>
            <td><?php echo $r['lastname']?></td>
            <td><?php echo $r['name']?></td> <!--reference name from specialty table instead of specialty id-->
           
            <td><a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View</a>
            <td><a href="edit.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">edit</a>
            <td><a onclick="return confirm('are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">delete</a>


            </td>
        </tr>
    <?php } ?>
</table>

<br/>
<a href="index.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">Home</a>

<br>
<?php require_once 'includes/footer.php';?>
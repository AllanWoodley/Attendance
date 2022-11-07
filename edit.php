<?php
    $title = "'Edit reservation'";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud -> getspecialties();

    if(!isset($_GET['id'])){
        include 'include/errormessage.php';
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
   
?>


       
    <?php $r = $results ->fetch(PDO::FETCH_ASSOC) ?>
    <?php ?>   

    <h1 class = "text-center">Edit registered member's information</h1>

<form method ="post" action="editpost.php">    
  <!--<form method ="get" action="success.php">-->

     <input type = 'hidden' name = 'id' value="<?php echo $attendee["attendeeID"] ?>" id = 'id' name = 'id' />

     
    <div class ="form-group">
       <label for="FirstName">First Name</label>
       <input type="text" class="form-control" value="<?php echo $attendee["firstname"] ?>" id="firstName" name ="firstname" placeholder="enter First Name">
     </div>

     <div class ="form-group">
       <label for="LastName">Last Name</label>
       <input type="text" class="form-control" value="<?php echo $attendee["lastname"] ?>" id="lastName" name ="lastname" placeholder="enter Last Name">
     </div>

     <div class ="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee["dateOfBirth"] ?>" id="dob" name = "dateOfBirth" placeholder="enter Date of Birth">
          </div>

          <div class ="form-group">
            <label for="specialty"> Area of expertise</label>
            <select class="form-control" id="specialtyID"name ="specialtyID">
                <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>
                  <option value ="<?php echo $r['specialtyID'] ?>"<?php if($r['specialtyID']==$attendee['specialtyID']) echo 'selected'?>>
                  <?php echo $r['name'] ?></option>
                  <?php }?>
                </select>
        <div class ="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" value="<?php echo $attendee["email"] ?>" id="email" name ="email" aria-describedby="emailHelp" placeholder="enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phoneNumber">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee["num"] ?>" id="phoneNumber" name ="num"placeholder="Contact number">
            <small id="PhoneHelp" class="form-text text-muted">We'll never share your contact with anyone else.</small>
        </div>

        <button type="submit" name="re-submit" href="index.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">Re-submit</button>
        <a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View changes</a>
        <a href="viewrecords.php" class="btn btn-primary">cancel</a>

    </form>

    <?php }?>

    <br/>
<br>
<?php require_once 'includes/footer.php';?>
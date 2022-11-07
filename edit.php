<?php
    $title = "'Edit reservation'";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud -> getAttendees();
?>


       
    <?php $r = $results ->fetch(PDO::FETCH_ASSOC) ?>
    <?php ?>   

    <h1 class = "text-center">Edit registered member's information</h1>

<form method ="post" action="success.php">    
  <!--<form method ="get" action="success.php">-->

    <div class ="form-group">
       <label for="FirstName">First Name</label>
       <input type="text" class="form-control" value="<?php echo $r["firstname"] ?>" id="firstName" name ="firstname" placeholder="enter First Name">
     </div>

     <div class ="form-group">
       <label for="LastName">Last Name</label>
       <input type="text" class="form-control" value="<?php echo $r["lastname"] ?>" id="lastName" name ="lastname" placeholder="enter Last Name">
     </div>

     <div class ="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $r["dateOfBirth"] ?>" id="dob" name = "dob" placeholder="enter Date of Birth">
          </div>

     <div class ="form-group">
        <label for="specialty"> Area of expertise</label>
        <select multiple class="form-control" id="specialtyID"name ="specialtyID">
                  <option value ="<?php echo $r['specialtyID'] ?>"><?php echo $r['name'] ?></option>       
        </select>         

        <div class ="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" value="<?php echo $r["email"] ?>" id="email" name ="email" aria-describedby="emailHelp" placeholder="enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phoneNumber">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $r["num"] ?>" id="phoneNumber" name ="number"placeholder="Contact number">
            <small id="PhoneHelp" class="form-text text-muted">We'll never share your contact with anyone else.</small>
        </div>

        <button type="submit" name="submit"class="btn btn-primary btn-block">Re-submit</button>
    </form>

    <br/>
<a href="view.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">View</a>
<a href="edit.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">edit</a>
<a href="delete.php?id=<?php echo $r['attendeeID']?>" class="btn btn-primary">delete</a>
<br>
<?php require_once 'includes/footer.php';?>
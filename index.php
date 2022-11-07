<?php 
$title = 'index';
require_once 'includes/header.php'; 
require_once 'db/conn.php';
$results = $crud->getSpecialties();
?>

    <h1 class = "text-center">Registration for IT conference</h1>

     <form method ="post" action="success.php">    
       <!--<form method ="get" action="success.php">-->

         <div class ="form-group">
            <label for="FirstName">First Name</label>
            <input required type="text" class="form-control" id="firstName" name ="firstname" placeholder="enter First Name">
          </div>

          <div class ="form-group">
            <label for="LastName">Last Name</label>
            <input required type="text" class="form-control" id="lastName"name ="lastname" placeholder="enter Last Name">
          </div>
          
          <div class ="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name = "dob" placeholder="enter Date of Birth">
          </div>

          <!--  -->
            <div class ="form-group">
            <label for="specialty"> Area of expertise</label>
            <select multiple class="form-control" id="specialtyID"name ="specialtyID">
               <!-- <option value = "1" >Database Admin</option>
                <option value = "2">Software Developer</option>
                <option value = "3">Web Admin</option>
                <option value = "4">Other</option>-->
                <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>
                  <option value ="<?php echo $r['specialtyID'] ?>"><?php echo $r['name'] ?></option>
                  <?php }?>
                </select>
        
        </div>
        <!-- -->
        <div class ="form-group">
            <label for="email">Email Address</label>
            <input required type="email" class="form-control" id="email" name ="email" aria-describedby="emailHelp" placeholder="enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phoneNumber">Contact Number</label>
            <input type="text" class="form-control" id="phoneNumber" name ="number"placeholder="Contact number">
            <small id="PhoneHelp" class="form-text text-muted">We'll never share your contact with anyone else.</small>
        </div>

        <button type="submit" name="submit"class="btn btn-primary btn-block">Submit</button>
    </form>

<?php require_once 'includes/footer.php'; ?>



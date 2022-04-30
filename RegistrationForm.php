<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-5.1.3-dist\css\bootstrap.min.css">
  <script src="jquery-3.6.0.min.js"></script>
  <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
  <script src="createEntertainer.js"></script>
</head>
<body>
<div class="container">

    <?php
    //define variables and set value empty
    $nameErr = $emailErr = $pwdErr = $pwdcErr = $genderErr = $websiteErr = $acceptErr = '';
    $name = $email = $pwd = $pwdc = $gender = $website = $accept = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
        if (empty($name)){
            $nameErr = 'name is required!';
        }else{
            $name = validate($_POST['name']);
            //check if name format is correct
            if (!preg_match("/^[a-zA-Z ]*$/",$name)){
                $nameErr = 'only letters and white space allowed!';
            }
        }

        if (empty($email)){
            $emailErr = 'email is required!';
        }else{
            $email = validate($_POST['email']);
            //check if the email format is correct
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr = 'email format is not correct!';
            }
        }

        if (empty($pwd)){
            $pwdErr = 'password is required!';
        }else{
            $pwd = validate($_POST['pwd']);
            //check if the password format is correct
        }

        if (empty($pwdc)){
            $pwdcErr = 'password is not confirmed!';
        }else{
            $pwdc = validate($_POST['pwdc']);
            //check if the password is matched or not
        }

        if (empty($gender)) {
            $genderErr = 'gender is required!';
        }else{
            $gender = validate($_POST['gender']);
        }

        if (empty($website)) {
            $websiteErr = '';
        }else{
            $website = validate($_POST['website']);
            //check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
            }
        }

        if (empty($accept)) {
            $acceptErr = 'you must accept the terms and conditions!';
        }else{
            $accept = validate($_POST['accept']);
        }
    }
  
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    ?>


    <div class="col-lg-offset-2 col-lg-10">
    <h2 >Registration form</h2>
    <p class="text-danger">* Required field</p>
      <!-- registration form -->
    <form id="register" method="post" class="form-horizontal" action="<?=htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <!-- username field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="username"><span class="text-danger">*</span> Username:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <?="<p class='text-danger'>$nameErr</p>";?>
        </div>
      
        <!-- password field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="password"><span class="text-danger">*</span> Password:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <?="<p class='text-danger'></p>";?>
        </div>

         <!-- password confirm field -->
         <div class="form-group">
            <label class="control-label col-lg-2" for="confm-pwd"><span class="text-danger">*</span> Confirm Password:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="pwdc" value="<?=$pwdc;?>" required>
            </div>
            <?="<p class='text-danger'>$pwdcErr</p>";?>
        </div>

        <!-- email field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="email"><span class="text-danger">*</span> Email:</label>
            <div class="col-lg-4">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?=$email;?>" required>
            </div>
            <?="<div class='text-danger'>$emailErr</div>";?>
        </div>
        
        <!-- first name field -->
        <div class="form-group">
           <label class="control-label col-lg-2" for="firstName"><span class="text-danger">*</span> First Name:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

        <!-- last name field -->
        <div class="form-group">
           <label class="control-label col-lg-2" for="lastName"><span class="text-danger">*</span> Last Name:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- phone field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="phone"><span class="text-danger">*</span> Phone Number:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="phone" placeholder="##########" name="phone" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- street field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="street"><span class="text-danger">*</span> Street:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="street" placeholder="1000 Morris Ave" name="street" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- city field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="city"><span class="text-danger">*</span> City:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="city" placeholder="Union" name="city" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- state field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="state"><span class="text-danger">*</span> State:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="state" placeholder="NJ" name="state" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- zipcode field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="zipcode"><span class="text-danger">*</span> Zipcode:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="zipcode" placeholder="#####" name="zipcode" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>

       <!-- type field -->
       <div class="form-group">
           <label class="control-label col-lg-2" for="type"><span class="text-danger">*</span> Type of Entertainment:</label>
           <div class="col-lg-4">
               <input type="text" class="form-control" id="type" placeholder="Musician" name="type" required>
           </div>
           <?="<p class='text-danger'></p>";?>
       </div>
      
      <!-- gender field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="gender"><span class="text-danger">*</span> Gender:</label>
            <div class="col-lg-2">
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo 'checked';?> value="Female"> Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo 'checked';?> value="Male"> Male
            </div>
            <?="<p class='text-danger'>$genderErr</p>";?>
        </div>
      
      <!-- website field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="website">Website:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="site" placeholder="Website" name="website" value="<?=$website;?>" required>
            </div>
            <?="<p class='text-danger'>$websiteErr</p>";?>
        </div>
      
      <!-- profile picture field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="photo">Profile Picture:</label>
            <label class="col-lg-4 custom-file">
                <input type="file" id="file2" class="custom-file-input" required>
                <span class="custom-file-control"></span>
            </label>
        </div>
      
      <!-- acceptence field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="accept" value="" required> <span class="text-danger">*</span> I accept the terms & conditions.
                    </label>
                </div>
            </div>
            <?="<p class='text-danger'>$acceptErr</p>";?>
        </div>
      
      <!-- submit and reset button field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="submit" name="register" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    </div>
</div>
</body>
</html>
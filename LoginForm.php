<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <?php
    //define variables with empty values
    $emailErr = $pwdErr = $rememberErr = '';
    $email = $pwd = $remember = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
        if (empty($_POST['email'])){
            $emailErr = 'Email is required!';
        }else{
            $email = validate($_POST['email']);
            //check if email address is well form
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr = 'Invalid email format!';
            }
        }

        if (empty($_POST['pwd'])){
            $pwdErr = 'Password is required!';
        }else{
            $pwd = validate($_POST['pwd']);
        }

        if (empty($_POST['remember'])) {
            $remember = '';
        }else{
            $remember = validate($_POST['remember']);
        }
    }

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

    <div class="col-lg-offset-2 col-lg-10">
        <!-- login form -->
    <form method="post" class="form-horizontal" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Login form with validation</h2>
        <p class="text-danger">* Required field</p>
        
        <!-- email field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="email"><span class="text-danger">*</span> Email:</label>
            <div class="col-lg-4">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <?="<p class='text-danger'>$emailErr</p>";?>
        </div>

        <!-- password field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="pwd"><span class="text-danger">*</span> Password:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <?="<p class='text-danger'>$pwdErr</p>";?>
        </div>
        
        <!-- remember me checkbox field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
            </div>
        </div>
        
        <!-- submit and reset button field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="submit" name="login" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </form>

        <!-- this part is to show what you have inputed -->
    <?="<h3>Your input:</h3><br>"?>
    <?="<h4>$email</h4><br>"?>
    <?="<h4>$pwd</h4><br>"?>
    <?="<h4>$remember</h4><br>"?>

    </div>
</div>
</body>
</html>
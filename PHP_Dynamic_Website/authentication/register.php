<?php 

include "../config.php";
$message="";

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpassword']);
    if($name!="" && $email!="" && $pwd!="" && $cpwd!="") {
        if($pwd===$cpwd) {
            $pwdencrypt = password_hash($pwd,PASSWORD_BCRYPT);
            $sql_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pwdencrypt');";
            $result = mysqli_query($conn,$sql_query);
            if($result) {
                header('Location:login.php');
            }
            else {
                $message="Account cannot be created. Contact customer support";
            }
        }
        else {
            $message="Passwords entered did not match";
        }
    }
    else {
        $message="All fields are mandatory";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="../assets/css/external.css" rel="stylesheet"/>
    
    <style>
         body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin-top: 20px; margin-left: auto; margin-right: auto; border: 2px solid grey; border-radius: 20px;}
        .help-block { color:red;}
    </style>
</head>
<body>
<div id="header">
        <a>Privacy Policy</a>
        <a>Terms & Conditions</a>
        <div id="login-dropdown">
            <button>Login/Register</button>
            <div id="dropdown-content">
                <a href="authentication/login.php">Login</a>
                <a href="authentication/register.php">Register</a>
            </div>
        </div>
    </div>
    <div id="logo-section">
        <div class="left-align">
            <img src="../assets/images/logo.gif" height="150px" width="150px"/>
            <h1>MUSIC HUB</h1>
            <p>----------------------------------------------------<br>One stop shop for all your musical needs</p>
        </div>
        <div class="right-align">
            <form action="search.php" method="get">
                <input name="keyword" id="search-input" placeholder="Search songs, artists, playlists,etc"/>
                <button id="search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
            </form>
        </div>
    </div>
    
    <div class="wrapper">
        <h2>Register</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="" method="post">
            <span class="help-block"><?php echo $message; ?></span>
            <div class="form-group">
                <label>Full Name</label>
                <input type="name" name="name" class="form-control">
            </div> 
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <p>Have an account? <a href="login.php">Sign in now</a>.</p>
        </form>
    </div>
</body>
</html>
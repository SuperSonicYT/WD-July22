<?php 

include "../config.php";
$message="";

if(isset($_POST['submit'])) {
    $opwd = mysqli_real_escape_string($conn,$_POST['opassword']);
    $npwd = mysqli_real_escape_string($conn,$_POST['npassword']);
    $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpassword']);
    $email = $_SESSION['useremail'];
    if( $opwd!="" && $npwd!="" && $cnpwd!="" ) {
        if($npwd===$cnpwd) {
            $sql_query = "SELECT password as PassWord FROM users WHERE email = '$email';";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            if(password_verify($opwd,$row['PassWord'])==true) {
                $pwdencrypt = password_hash($npwd,PASSWORD_BCRYPT);
                $sql_query = "UPDATE users SET password='$pwdencrypt' WHERE email='$email';";
                $result = mysqli_query($conn,$sql_query);
                if($result) {
                    session_destroy();
                    header('Location:login.php');
                }
                else {
                    $message="There was an error while updating your password";
                }
            }
            else {
                $message="Old password entered did not match";
            } 
        }
        else {
            $message="New Passwords entered did not match";
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
        <?php if(isset($_SESSION['username'])) { ?>
        <div id="login-dropdown">
            <button><?php echo $_SESSION['username'] ?></button>
            <div id="dropdown-content">
                <a href="authentication/changepwd.php">Change password</a>
                <a href="index.php?logout=true">Logout</a>
            </div>
        </div>
        <?php } else { ?>
        <div id="login-dropdown">
            <button>Login/Register</button>
            <div id="dropdown-content">
                <a href="authentication/login.php">Login</a>
                <a href="authentication/register.php">Register</a>
            </div>
        </div>
        <?php } ?>
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
        <h2>Change Password</h2>
        <p>Please fill in your credentials to change the password.</p>
        <form action="" method="post">
            <span class="help-block"><?php echo $message; ?></span>
            <div class="form-group">
                <label>Enter Old Password</label>
                <input type="password" name="opassword" class="form-control">
            </div>    
            <div class="form-group">
                <label>Enter New Password</label>
                <input type="password" name="npassword" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="cnpassword" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Change Password" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
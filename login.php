<?php
    session_start();
    require_once("./config.php");

    if(isset($_POST["login_form"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $result = mysqli_query($con, $query);
        $row = $result->fetch_assoc();

        if( $row !== null ){
            var_dump($row);
        } else {
            $_SESSION["error"] = "Invalid email or password.";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Base Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container mt-4 text-center">
        <div class="jumbotron">
            <h1>Role base login in PHP</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <?php 
                if(  !empty($_SESSION["error"])  ){
            ?>
                <div class="alert alert-danger">
                 <?php echo $_SESSION["error"] ?>                    
                </div>
            <?php 
                 $_SESSION["error"] = null;
                }
            ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-block btn-info" name="login_form" value="Login">
                </div>

            </form>
        </div>
    </div>


    
</body>
</html>
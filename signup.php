<?php

$userName = "";
$userPassword = "";
$username = $_POST["username"] ?? "";

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? ""; 

if($_SERVER['REQUEST_METHOD']=="post"){

    if(empty($_POST['username'])){
        $userName = "Enter username";
    }
    if(empty($_POST['password'])){
        $userPassword = "Enter password";
    }
}



$role = "user";

$errorMessage = "";

if ($email != "" && $password != "") {  
    $fp = fopen('./data/bb.csv', "a");
    
    fwrite($fp, "\n{$role}, {$email}, {$password}, {$username}");
    fclose($fp);

    header("Location: login.php");
}
else {
    $errorMessage = "Please enter you email and password!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5 w-25">

    <div class="card  p-3" style="width: 30rem;">
        <h3 class="text-center text-success">Create Registration</h3>

        <form action="signup.php" method="POST">

        <div class="form-group">
            <label for="username">User name</label>
            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter username">
            
        </div>
        <span class="text-success"><?php echo $userName ?></span>

      

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>

     

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="******">
        </div>

        <span class="text-success"><?php echo $userPassword ?></span>

        <button type="submit" class="btn btn-warning mt-2">Sign up</button><span>
        <a type="button" class="btn btn-warning mt-2" href = "login.php">Back to Login</a>   
        </span>
        </form>
        
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
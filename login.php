<?php
session_start([
    'cookie_lifetime' => 5,
]);



$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";


$fp = fopen("./data/bb.csv", "r");

$roles = array();
$emails = array();
$passwords = array();
$usernames = array();


while ($line = fgets($fp)) {
    $values = explode(",", $line);  // role, email, password, firstname, lastname, age

    array_push($roles, trim($values[0]));
    array_push($emails, trim($values[1]));
    array_push($passwords, trim($values[2]));
    array_push($usernames, trim($values[3]));

}

fclose($fp);

for ($i = 0; $i < count($roles); $i++) {



    if ($email == $emails[$i] && $password == $passwords[$i]){
        $_SESSION["role"] = $roles[$i];
        $_SESSION["email"] = $emails[$i];
        $_SESSION["username"] = $usernames[$i];

   

        if ($_SESSION["role"] == "user"){
            header("Location: index_user.php");
        }
        else if($_SESSION["role"] == "manager"){
            header("Location: index_manager.php");
        }
        else{
            header("Location: index.php");
        }
       
       
    }
    else {
     
              echo "";}
          
     
    
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
        <h3 class="text-center text-success">Login to your account</h3>

        <form  action="login.php" method="POST">
       
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <div class="input-group has-validation">
                
                <input type="password" class="form-control" aria-describedby="inputGroupPrepend"  name="password" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Enter password" required>
                <div class="invalid-feedback">
                    Password can't be empty
                </div>
                
             </div>
            </div>
            



        <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        <p class = "text-primary h6">Admin Email : a@gmail.com</p>
        <p class = "text-primary h6">Admin Password : 1234</p>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</script>
</body>
</html>
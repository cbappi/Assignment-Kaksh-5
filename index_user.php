<?php 

session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {
    header("Location: login.php");
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
		<div class="container mt-5 w-50">
			<div class="card p-3" style="width: 50rem;">
			    <h2 class="text-success">User panel</h2>
				<h2 class="text-success">Welcome! <?php echo $_SESSION["username"]  ?></h2>
				<h2 class="text-success">Role: <?php echo $_SESSION["role"];  ?></h1>
				
				<h2 class="text-info">List all types of  users</h1>

				<table class="table">
						<thead>
								<tr>
			
									<th scope="col">Email</th>
									<th scope="col">User name</th>
			
								</tr>
						</thead>
  						<tbody>
    
							<?php
								$fp = fopen('data/bb.csv', "r");
								while($student = fgetcsv($fp)) {?>
			
									<tr>

										<td>  <?php echo $student[1] ?> </td>
										<td><?php echo $student[3] ?></td>
				
							<?php } ?>

        							</tr>
  

  						</tbody>
				</table>
				
				<a type="button" class="btn btn-info" href = "logout.php">Logout</a>
			
			</div>
		</div>	

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	</body>
</html>


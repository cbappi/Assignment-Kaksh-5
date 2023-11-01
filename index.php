<?php 

session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
}



require('functions.php')
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap link always comes before other CSS links -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<title>Admin</title>
	</head>
	<body>
		<div id="wrapper" class="container">
		
	
			<h1>Admin panel</h1>
				<h1>Welcome! <?php echo $_SESSION["username"]  ?></h1>
				<h2>Role: <?php echo $_SESSION["role"];  ?></h1>
			
			<section role="main">
				
				<?php include('layout/main.php') ?>
			</section>
		
			<a type="button" class="btn btn-info" href = "logout.php">Logout</a>
	
		</div>
	</body>
</html>


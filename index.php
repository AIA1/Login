<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Web Application bitches</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<div class="header">
	<a href="/auth">Your app name</a>
	</div>
	<?php if(isset($_SESSION['user_id']) ): 
	print_r($_SERVER);
	?>
	<br />Welcome.You are succesfully logged in!
	<a href="logout.php">Logout</a>
	<?php else: ?>
	<h1>Login or Register </h1>
	<a href="login.php">Login</a> or
	<a href="register.php">Register</a>
	<?php endif; ?>
</head>
<body>
	

</body>
</html>
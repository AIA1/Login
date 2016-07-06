<?php 
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: /auth");
};
require("database.php");

$message = '';
if(!empty($_POST['email']) && !empty($_POST['password'])){

	$sql = "INSERT INTO users (email,password) VALUES (:email,:password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email',$_POST['email']);
	$pass_hash =password_hash(  $_POST['password'],PASSWORD_BCRYPT);//To avoid a notice for refrencing a value not a variable in *.
	$stmt->bindParam(':password',$pass_hash);//*

	if( $stmt->execute() ){
		$message = 'Successfully created new user!';
		
	}
	else
		$message = 'Sorry there must have been an issue creaing an account';
		
}		


 ?>
<html>
<head>
	<title>Register below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<div class="header">
	<a href="/auth">Your app name</a>
	</div>
	<?php if(!empty($message)) ?>
		<p> <?=$message ?></p>
</head>
<body>
	<h1>Register</h1>
	<div class="or">
	<span>or <a href="login.php">Login Here</a></span>
	</div>
	<form action="register.php" method="POST">
	<input type="text" placeholder="Enter your email here" name="email">
	<input type="password" placeholder="and password here" name="password">
	<input type="password" placeholder="confirm password" name="confirm_password">
	<input type="submit" name="Register">
	</form>
</body>
</html>
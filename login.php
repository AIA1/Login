<?php 
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: /auth");
};
require ('database.php');
$message= '';

if(!empty($_POST['email']) && !empty($_POST['password'])){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email=:email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	
	if(count($results)>0 && password_verify($_POST['password'],$results['password']) ){
		$_SESSION['user_id'] = $results['id'];
		header("Location : /auth");
	}else{
		
		$message = 'Sorry,the credentials were wrong ';
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
	<a href="/auth">Your app name</a>
</div>
<?php if(!empty($message)) ?>
		<p> <?=$message; ?></p>
	<h1>Login</h1>
	<div class="or">
	<span>or <a href="register.php">Register Here</a></span>
	</div>
	<form action="login.php" method="POST">
	<input type="text" placeholder="Enter your email here" name="email">
	<input type="password" placeholder="and password here" name="password">
	<input type="submit" name="Login">
	</form>
</body>
</html>
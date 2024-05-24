<?php include('connect.php')?>
<?php
session_start();
if(isset($_POST['login'])){
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

	$sql = mysqli_query($con, "INSERT INTO `users` (`login`,`password`,`email`) 
		values ('{$_POST['login']}', '{$_POST['password']}', '{$_POST['email']}')");

	if ($sql){
		header('location: index.php');
	}
	else{
		echo 'произошла ошибка ' . mysqli_error($con) .''; 
		header('location: registration.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<form method="POST">
		<input type="text" name="login">
		<input type="password" name="password">
		<input type="text" name="email">
		<input type="submit" value="ok">
	</form>
</body>
</html>
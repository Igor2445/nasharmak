<?php include('connect.php')?>
<?php
session_start();
if(!empty($_REQUEST['password']) and !empty($_REQUEST['login'])){
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];

	$sql = "select * from `users` where `login` = '$login' and `password` = '$password'";

	$res = mysqli_query($con, $sql);
	$user = mysqli_fetch_assoc($res);

	if(!empty($user)){
		session_start();
		$_SESSION['auto'] = true;
		$_SESSION['login'] = $user['login'];
		$_SESSION['password'] = $user['password'];
		header('location: pageone.php');
	}
	else{
		header('location: auto.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSSphp.php">
</head>
<body>
	<form method="post">
		<input type="text" name="login">
		<input type="password" name="password">
		<input type="submit" value="войти">
		<input type="submit" value="войти">
		<input type="button" value="зарегестрироваться">

	</form>
</body>
</html>
<?php include('connect.php')?>
<?php
session_start();
if(!empty($_REQUEST['password']) and !empty($_REQUEST['login'])){
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];

	$sql = "SELECT * from `user` where `login` = '$login' and `password` = '$password'";

	$res = mysqli_query($con, $sql);
	$user = mysqli_fetch_assoc($res);

	if(!empty($user)){
		session_start();
		$_SESSION['auto'] = true;
		$_SESSION['id'] = $user['id'];
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
	<link rel="stylesheet" type="text/css" href="CSSphp.css">
</head>
<body>
	<div class="reg">
	<form method="post">
		<div class="re1"><input type="text" name="login"></div>
		<div class="re2"><input type="password" name="password">  </div>
		<div class="re3"><input type="submit" value="войти"></div>
		<div class="reks"><li class="popo">Если нет акаунта? 
			<a href="registration.php">Зарегистрируйся</a>
		</li></div>
	</form>
</div>
</body>
</html>

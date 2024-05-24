<?php include('connect.php')?>
<?php
session_start();
if(isset($_POST['login'])){
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$gmail = filter_var(trim($_POST['gmail']), FILTER_SANITIZE_STRING);

	$sql = mysqli_query($con, "INSERT INTO `user` (`login`,`password`,`gmail`)
		values ('{$_POST['login']}', '{$_POST['password']}', '{$_POST['gmail']}')");

	if ($sql){
		header('location: pageone.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="CSSphp3.css">
</head>
<body>

	<form method="POST">
	<div class="menu">	
		<div class="reg">
	<div class="re1"><input type="text" name="login"></div>
	 <div class="re2"><input type="password" name="password"></div>
	<div class="re3"><input type="text" name="gmail"></div>
	<div class="re4"><input type="submit" value="закончить"> </div>
	   	 </div>
	    </div>
	</form>
</body>
</html>

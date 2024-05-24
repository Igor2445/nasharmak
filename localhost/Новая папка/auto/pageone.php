<?php include('connect.php')?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		session_start();
		echo '<div>'.$_SESSION['login'].'</div>';
	?>

	<?php
		session_start();
		if(isset($_SESSION['login'])){
			echo '
				<a href="exit.php">выйти</a>
			';
		}
	?>
</body>
</html>
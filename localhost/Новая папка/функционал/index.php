<?php include('connect.php') ?>

<?php
	if(isset($_GET['del_id'])){
		$sql = mysqli_query($con, "DELETE from `user` where `id` = {$_GET['del_id']}");
	}
?>

<?php
	if (isset($_POST["surname"])) {
		if (isset($_GET['red_id'])) {
			$sql = mysqli_query($con, "UPDATE `user` SET 
				`surname` = '{$_POST['surname']}',
				`name` = '{$_POST['name']}',
				`post` = '{$_POST['post']}' WHERE `id` = {$_GET['red_id']}");
		}
		else{
			$sql = mysqli_query($con, "INSERT INTO `user` (`surname`,`name`,`post`)
				values ('{$_POST['surname']}','{$_POST['name']}', '{$_POST['post']}')");

		}
	}

	if (isset($_GET['red_id'])) {
		$sql = mysqli_query($con, "SELECT `id`, `surname`,`name`,`post` from `user` 
			where `id` = {$_GET['red_id']}");
		$resultat = mysqli_fetch_array($sql);
	}
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>фамилия</td>
				<td>
					<input type="text" name="surname" 
					value="<?=isset($_GET['red_id']) ? $resultat['surname'] : '';?>"></td>
			</tr>
			<tr>
				<td>имя</td>
				<td><input type="text" name="name" value="<?=isset($_GET['red_id']) ? $resultat['name'] : '';?>"></td>
			</tr>
			<tr>
				<td>должность</td>
				<td><input type="text" name="post" value="<?=isset($_GET['red_id']) ? $resultat['post'] : '';?>"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="ok">
				</td>
			</tr>
		</table>
	</form>

	<table border="1">
			<tr>
				<td>id</td>
				<td>фамилия</td>
				<td>имя</td>
				<td>должность</td>
			</tr>
			<?php
				$sql = mysqli_query($con, 'SELECT `id`, `surname`, `name`, `post` from `user`');
				while ($result = mysqli_fetch_array($sql)){
				echo
				'<tr>'.
					"<td>{$result['id']}</td>".
				    "<td>{$result['surname']}</td>".
					"<td>{$result['name']}</td>".
					"<td>{$result['post']}</td>".

					"<td><a href='?del_id={$result['id']}'>удалить</a></td>".
					"<td><a href='?red_id={$result['id']}'>изменить</a></td>".
				'</tr>';}
			?>
	</table>
</body>
</html>
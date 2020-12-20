<?php
require dirname(__DIR__).'\db.php';
if (isset($_POST['number']) && isset($_POST['pass'])) {
	$number = trim($_POST['number']);
	$pass = md5(trim($_POST['pass']));
	$query = mysqli_query($link, "SELECT * FROM `users` WHERE `phonenumber`='$number' AND `pass`='$pass'");
	$user = mysqli_fetch_assoc($query);
	if (count($user) == 0) {
		echo '<script> alert("Пользователь не найден.");
			reload();</script>';
	}
    setcookie('userid', $user['id'], time() + 3600, "/");
    setcookie('username', $user['name'], time() + 3600, "/");
	setcookie('useremail', $user['mail'], time() + 3600, "/");
	setcookie('userphone', $user['phonenumber'], time() + 3600, "/");
	setcookie('isadmin', $user['isadmin'], time() + 3600, "/");
	header('Location: /');
}
?>
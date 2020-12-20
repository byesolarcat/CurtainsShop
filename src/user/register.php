<?php
require dirname(__DIR__).'\db.php';
if (isset($_POST['number']) & isset($_POST['email'])) {
    $number = trim($_POST['number']);
	$query = mysqli_query($link, "SELECT `phonenumber` AS `number` FROM `users` WHERE `phonenumber`='$number'");
	$number = mysqli_fetch_assoc($query)['number'];
	if (mb_strlen($number) > 0) {
		echo '<script> alert("Пользователь с таким номером телефона уже зарегистрирован.");
			reload();</script>';
	} else if (mb_strlen($_POST['pass']) < 6) {
		echo '<script> alert("Длина пароля должна быть больше 6 символов");
			reload();</script>';
	} else {
		$pass = trim($_POST['pass']);
		$pass = md5($pass);
        $number = trim($_POST['number']);
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
		mysqli_query($link, "INSERT INTO `users`(`pass`, `phonenumber`, `mail`, `name`)
            VALUES ('$pass', '$number', '$email', '$name')");
		header("Location: /");
	}
}
?>
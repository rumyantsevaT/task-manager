<?php
session_start();
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$remember = $_POST['rememberme'];

//Проверка нажата ли Запомнить меня
if(isset($remember) AND $remember == "yes"){
    $_SESSION['remember'] = $remember;
}
//проверка вводимых данных на пустоту
foreach ($_POST as $input) {
	if(empty($input)) {
		include 'errors.php';
		exit;
	}
}
//Подготовка и выполнение запроса к БД
$pdo = new PDO('mysql:host=localhost;dbname=taskmanager', 'root', 'root');
$sql = 'SELECT id, email FROM users WHERE email=:email AND password=:password';
$statement = $pdo->prepare($sql);

//Хеширование пароля в md5
$password = md5($password);
//передача параметров вместо :email и :password
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $password);
$statement->execute();
//получаем результат в виде ассоциативного массива
$user = $statement->fetch(PDO::FETCH_ASSOC);

//Не нашли пользователя
if(!$user) {
	$errorMessage = "Неверный логин и пароль";
	include 'errors.php';
	exit;
}
//Если нашли пользователя- Записываем данные в сессию
$_SESSION['user_id'] = $user['id'];
$_SESSION['email'] = $user['email'];


//Переадресация
header("Location: /list.php");


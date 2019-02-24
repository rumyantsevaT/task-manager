<?php
//Принимаем входные данные из формы
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//Валидация на пустоту полей
foreach ($_POST as $input) {
    if(empty($input)) {
        include 'errors.php';
    exit;
    }
}
//Проверка существующего пользователя
$pdo = new PDO('mysql:host=localhost;dbname=taskmanager', 'root', 'root');
$sql = "SELECT id FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute([':email' => $email]);
$user = $statement->fetchColumn();
if($user) {
    $errorMessage = "Пользователь с таким email уже существует";
    include 'errors.php';
    exit;
}

//Запись данных в БД
$sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$statement = $pdo->prepare($sql);
//password hash
    $_POST['password'] = md5($_POST['password']);
    $result = $statement->execute($_POST);
    if(!$result) {
        $errorMessage = "Ошибка регистрации ";
        include 'errors.php';
        exit;
    }
//Переадресация на страницу авторизации
header('Location: /login-form.php');

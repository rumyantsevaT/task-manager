<?php

//Подключаем соединение с БД
require "connect_to_db.php";

//Принимаем входные данные из формы
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

//Валидация на пустоту полей
foreach ($_POST as $input) {
    if(empty($input)) {
        include 'errors.php';
    exit;
    }
}
//Проверка существующего пользователя
//$pdo = new PDO('mysql:host=localhost;dbname=taskmanager', 'root', 'root');
$sql = "SELECT id FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute([':email' => $email]);
$user = $statement->fetchColumn();
if($user) {
    $errorMessage = "Пользователь с таким email уже существует";
    	include 'errors.php';
    exit;
}

//Запись введенных данных пользователя в БД
$sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$statement = $pdo->prepare($sql);

//кодировка пароля в md5
$_POST['password'] = md5($_POST['password']);
//Результат - запись POST данных
$result = $statement->execute($_POST);
if(!$result) {
    $errorMessage = "Ошибка регистрации ";
    include 'errors.php';
    exit;
}
//Переадресация на страницу авторизации
header('Location: login-form.php');

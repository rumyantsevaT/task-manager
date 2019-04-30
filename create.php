<?php
//Подключаем соединение с БД
require "connect_to_db.php";

session_start();
//Обрезаем входные данные
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$imgname = $_FILES['image_file']['name'];
$imgesize = $_FILES['image_file']['size'];
$tmpname = $_FILES['image_file']['tmp_name'];

//Валидация на пустоту полей
foreach ($_POST as $input) {
    if(empty($input)) {
        include 'errors.php';
        exit;
    }
}
//Валидация на размер файла
if($image_size > 15728640) {
    $errorMsg = 'Файл не должен превышать 15МБ';
    include 'errors.php';
    exit;
}

//Сохранение задачи в базе данных
//$pdo = new PDO("mysql:host=localhost;dbname=taskmanager;charset=utf8", "root", "root");
$sql = "INSERT INTO tasks (title, description, image, user_id) VALUES (:title, :description, :image, :user_id)";
$statement = $pdo->prepare($sql);
$statement->bindParam(":title", $title);
$statement->bindParam(":description", $description);
$statement->bindParam(":image", $imgname);
$statement->bindParam("user_id", $_SESSION['user_id']);
$task = $statement->execute();

//Перемещаем картинку в папку uploads
move_uploaded_file($tmpname, 'uploads/'.$tmpname);

header("Location: list.php");
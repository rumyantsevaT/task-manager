<?php
//Обрезаем входные данные
session_start();
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$imgname = $_FILES['image_file']['name'];
$imgesize = $_FILES['image_file']['size'];
$tmpname = $_FILES['image_file']['tmp_name'];
var_dump($_SESSION);
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
$pdo = new PDO("mysql:host=localhost;dbname=taskmanager;charset=utf8", "root", "root");
$sql = "INSERT INTO tasks (title, description, image) VALUES (:title, :description, :image)";
$statement = $pdo->prepare($sql);
$statement->bindParam(":title", $title);
$statement->bindParam(":description", $description);
$statement->bindParam(":image", $imgname);
$task = $statement->execute();

//Перемещаем картинку в папку uploads
move_uploaded_file($tmpname, 'uploads/'.$_FILES['image_file']['name']);


header("Location: list.php");
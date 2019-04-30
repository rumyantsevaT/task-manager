<?php
//Подключаем соединение с БД
require "connect_to_db.php";

$sql = "UPDATE tasks SET title=:title, description=:description, image=:image WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $_GET['id']);
$statement->bindParam(":title", $_POST['title']);
$statement->bindParam(":description", $_POST['description']);
$statement->bindParam(":image", $_FILES['image_file']['name']);
$statement->execute();

//Перемещаем картинку в папку uploads
move_uploaded_file($tmpname, 'uploads/'.$tmpname);
//Перекидываем пользователя на список тасков
header("Location: list.php");
<?php
require "connect_to_db.php";
$id = $_GET['id'];
//Удаляем задачу по id
$sql = "DELETE FROM tasks WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();
//Переадресация на список задач
header("Location: list.php");

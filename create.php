<?php
$title = $_POST['title'];
$description = $_POST['description'];

//Валидация на пустоту полей
foreach ($_POST as $input) {
    if(empty($input)) {
        include 'errors.php';
        exit;
    }
}
//Запись в БД
$pdo = new PDO("mysql:host=localhost;dbname=taskmanager","root", "root");
$sql = "INSERT INTO posts (title, desctiption) VALUE (':title', ':description')";
$statement = $pdo->prepare($sql);
$statement->execute([
    ':title' => $title,
    ':description' => $description
]);
$post = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($post);

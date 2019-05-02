<?php
//Настроить форму
//Получить предзаполненные данные
//Переадресация на листинг
session_start();
//Подключаем соединение с БД
require "connect_to_db.php";

//$pdo = new PDO("mysql:host=localhost;dbname=taskmanager;charset=utf8", "root", "root");
$sql = "SELECT * FROM tasks WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $_GET['id']);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);
//var_dump($task);
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Edit Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="update-form.php?id=<?= $task['id'];?>" method="POST" enctype="multipart/form-data">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Изменить запись</h1>
        <label for="inputText" class="sr-only">Название</label>
        <input type="text" id="inputText" class="form-control" placeholder="Название" name="title" required value="<?= $task['title'];?>">
        <label for="inputText" class="sr-only">Описание</label>
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"><?= $task['description']?></textarea>
        <input type="file" name="image_file"><img src="<?php
          if(empty($task['image'])){
              echo "assets/img/no-image.jpg";
          } else {
              echo "uploads/".$task['image'];
          }
          ?>" width="400" class="mb-3">
        <button class="btn btn-lg btn-success btn-block" type="submit">Редактировать</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>

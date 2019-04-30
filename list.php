<?php
session_start();
//Подключаем соединение с БД
require "connect_to_db.php";
//Соединяемся с БД и достать юзера по id
//$pdo = new PDO("mysql:host=localhost;dbname=taskmanager;charset=utf8", "root", "root");
$sql = "SELECT id, title, description, image FROM tasks WHERE user_id=:user_id";
$statement = $pdo->prepare($sql);
//привязка к сессии id пользователя
$statement->bindParam(":user_id", $_SESSION['user_id']);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Tasks</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О проекте</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white"><?= $_SESSION['email'];?></h4>
              <ul class="list-unstyled">
                <li><a href="/logout.php" class="text-white">Выйти</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Tasks</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
<!--Заголовок-->
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Проект Task-manager</h1>
          <h3 class="jumbotron-heading">Привет, <?php echo $_SESSION['user_name'];?></h3>
          <p class="lead text-muted">Этот проект позвляет оперировать задачами.</p>
          <p>
            <a href="create-form.php" class="btn btn-primary my-2">Добавить запись</a>
          </p>
            <p>Если у вас нет подходящего изображения, выберите его из папки <br>assets/img/любоеИзображение.jpg</p>
        </div>
      </section>

    <div class="album py-5 bg-dark">
        <div class="container">
            <div class="row">
                <?php foreach ($tasks as $task):?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="<?php
                                if(empty($task['image'])){
                                    echo "assets/img/no-image.jpg";
                                } else {
                                    echo "uploads/".$task['image'];
                                }
                            ?>" width="300">
                            <div class="card-body">
                                <p class="card-text"><?= $task['title'];?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="show.php?id=<?= $task['id'];?>" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                            <a href="edit-form.php?id=<?= $task['id'];?>" class="btn btn-sm btn-outline-secondary">Изменить</a>
                                            <a href="delete.php?id=<?= $task['id'];?>" class="btn btn-sm btn-outline-secondary" onclick="confirm('Вы уверены?')">Удалить</a>
                                        </div>
                                    </div>
                            </div>
                        </div><!--.cart-->
                    </div><!--.col-md-4-->
                <?php endforeach;?>
            </div>
        </div><!--.container-->
      </div>
    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Наверх</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>

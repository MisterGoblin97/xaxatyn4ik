<html>
  <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Пожалуйста, подождите! Идет анализ данных!</title>

    <!-- SEO -->
    <meta name='description' content='Summit Hackathon'>
    <meta name='keywords' content='Крестиненко, Игонькин, Лабузов, Мугалев'>
    <meta name='author' content='IT-Гигант'>
    <meta name='copyright' content='Крестиненко, Игонькин, Лабузов, Мугалев'>
    <meta property='og:title' content='Summit Hackathon'>
    <meta property='og:description' content='Крестиненко, Игонькин, Лабузов, Мугалев'>
    <meta property='og:site_name' content='Summit Hackathon'>
    <meta name='twitter:site' content='IT-Гигант'>
    <meta name='twitter:title' content='Крестиненко, Игонькин, Лабузов, Мугалев'>
    <meta name='twitter:description' content='Summit Hackathon'>

    <!-- Подключение внешних объектов -->
      <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'>
    <link rel='stylesheet' href='styles/style.css'>
  </head>
  <body>
    <div class='loader'>
      <svg width='200' height='200' viewBox='0 0 100 100'>
        <polyline class='line' points='0,0 100,0 100,100' stroke-width='10' fill='none'></polyline>
        <polyline class='line' points='0,0 0,100 100,100' stroke-width='10' fill='none'></polyline>
        <polyline class='line line__animation' points='0,0 100,0 100,100' stroke-width='10' fill='none'></polyline>
        <polyline class='line line__animation' points='0,0 0,100 100,100' stroke-width='10' fill='none'></polyline>
      </svg>
    </div>
    <h2> Неверный пароль </h2>

  </body>
</html>

<?php
session_start();

//Проверяем, что используется Post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['text'];
    $password = $_POST['password'];

   //Создаем пожелючение к БД
    $db = new PDO("sqlite:database.db");
        
    //Создаем заполнители и связываем данные с ними
    $stmt = $db->prepare("SELECT * FROM account WHERE login = ? AND pass = ?");
    $stmt->bindValue(1, $login, PDO::PARAM_STR);
    $stmt->bindValue(2, $password, PDO::PARAM_STR);

    $stmt->execute();
    $exec = $stmt->fetch(PDO::FETCH_ASSOC);

    //Проверка условием на соответствие
    if ($exec) {
      $_SESSION['account_id'] = $exec['id'];
      header('location: app.php');
      exit();
      } else {
       header('location: index.php');
      }
}
?>

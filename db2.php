<?php
  // Подключение к БД с помощью PDO
  $pdo = new PDO('mysql:host=localhost;dbname=sendit;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
?>

<?php
  // Отключение таймера куки
  setcookie('account', $account['nickname'], time() - 100000, '/sendit');
  // Переход домой
  header('Location: index.php');
?>

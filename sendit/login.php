<?php
  // Переменные вводимых данных
  $text = filter_var(trim($_POST['nickname']));
  $password = filter_var(trim($_POST['password']));

  // Данные для доступа к БД
  $mysql = new mysqli('localhost', 'root', '', 'sendit');

  // Проверка совпадения админа
  $admin = $mysql -> query("SELECT * FROM admin WHERE nickname = '$nickname' AND password = '$password'");
  $account = $admin -> fetch_assoc();

  // Вход в админа
  if(mysqli_num_rows($admin)) {
    setcookie('account', $account['email'], time() + 100000, '/sendit');
    header('Location: app.php');
    // Когда нет пользователя
  } else {
    echo
    '<script>
      alert("Пользователь не найден");
      window.location="index.php";
    </script>';
    exit();
  }
?>

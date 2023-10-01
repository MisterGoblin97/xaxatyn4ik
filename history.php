<!DOCTYPE html>
<html lang='ru'>

<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>SENDIT</title>

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
	<!-- Загрузка страницы -->
	<div class='loader'>
		<svg width='200' height='200' viewBox='0 0 100 100'>
			<polyline class='line' points='0,0 100,0 100,100' stroke-width='10' fill='none'></polyline>
			<polyline class='line' points='0,0 0,100 100,100' stroke-width='10' fill='none'></polyline>
			<polyline class='line line__animation' points='0,0 100,0 100,100' stroke-width='10' fill='none'></polyline>
			<polyline class='line line__animation' points='0,0 0,100 100,100' stroke-width='10' fill='none'></polyline>
		</svg>
	</div>
    <!--Кнопка пользователя -->
    <div class='account__outer container'>
		<a href="app.php" class ='history'>Workspace </a>
		<form action="logout.php">
		    <button class='account'>Выход</a>
		</form>
	</div>

    <!-- Шапка -->
	<header class='header__outer header'>
		<div class='menu'>
			<div class='header__inner container'>
				<a class='logo' href='#'>
					<img src='images/logo.svg' alt='logo' loading='lazy'>
					SendIt
				</a>
			</div>
		</div>
	</header>

    <!--Форма поиска-->
    <div class='form__out'>
		<div class='form__found'>
            <form method="post" action="">
                <input type="text" name="search" placeholder="Введите номер телефона">
                <input type="submit" value="Поиск">
            </form>
        </div>
    </div>

</body>
<footer>© 2023 SENDIT. Все права защищены.</footer>
</html>

<script src='scripts/script.js'></script>

<?php
$db = new SQLite3("database.db");

//Проверка на использования POST и имется ли значение в инпуте
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = $_POST['search'];
    
    //Выполняем запрос из бд
    $select_query = "SELECT * FROM history WHERE phone LIKE :phone";
    $stmt = $db->prepare($select_query);
    $stmt->bindValue(':phone', "%$search%", SQLITE3_TEXT);
    $result = $stmt->execute();
} else {
    $select_query = "SELECT * FROM history";
    $result = $db->query($select_query);
}

//Вывод таблицы history в виде table
if ($result) {
    echo '<table>';
    echo '<tr><th>ID</th><th>Телефон</th><th>Сообщение</th><th>Дата</th><th>UUID</th><th>Статус</th></tr>';
    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['message'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
		echo '<td>' . $row['uuid'] . '</td>';
		echo '<td>' . $row['status'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Ошибка при выполнении запроса: ' . $db->lastErrorMsg();
    }
?>
    

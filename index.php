<!DOCTYPE html>
<html lang='ru'>

<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>SENDIT - поиск персонала и публикация вакансий</title>

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

	<!-- Попап для авторизации -->
	<div id='popup-login' class='overlay'>
		<a class='cancel' href='#'></a>
		<div class='popup'>
			<a class='close' href='#'>&times;</a>

			<div id='login'>
				<h2>Авторизация</h2>
				<form action="login.php" method="post">
        			<input type="text" class="form-control" name="text" id="text" placeholder="Введите псевдоним *" required>
        			<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль *" required>
        			<button type="submit" class="btn">Авторизоваться</button>
    			</form>
			</div>
		</div>
	</div>

	<!-- Шапка -->
	<header class='header__outer header'>
		<div class='menu'>
			<div class='header__inner container'>
				<a class='logo' href='#'>
					<img src='images/logo.svg' alt='logo' loading='lazy'>
					SendIt
				</a>

				<a class='btn btn__account' href='index.php#popup-login'>Авторизоваться
					<img src='images/account.svg' alt='account' loading='lazy'>
				</a>
			</div>
		</div>
	</header>

	<!-- Заглавная секция -->
	<section class='hero'>
		<div class='container'>
			<div class='hero__inner'>
				<div>
					<h1>Доставка SMS в 2 клика</h1>
					<p>
						Клиент сервиса для отправки сообщений по номерам телефона использующий технологию API. Разработан в рамках проекта SummIT Challenge
					</p>
				</div>
			</div>
		</div>

		<!-- Волна для перехода -->
		<div class='wave'>
			<div class='wave__inner'></div>
		</div>
	</section>

	<footer>© 2023 SENDIT. Все права защищены.</footer>

	<!-- Скрипты -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
	<script src='scripts/script.js'></script>
</body>

</html>

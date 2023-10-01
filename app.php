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

	<!-- Кнопки пользователя -->
	<div class='account__outer container'>
		<a href="history.php" class ='history'>История </a>
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

	<!-- Форма добавления в рассылку -->
	<main class='main'>
		<div class='container'>
			<div class='main__inner'>
				<h2>Отправка сообщения</h2>
		
				<form class='form' action="process_data.php" method='post'>
				<textarea name='message' id='message' placeholder='Введите сообщение *' required></textarea>
				<div class='form__inner' id='phoneInputs'>
					<div class="form_tel_phones" id="form_tel_phones">
						<input class="input_tel_phones" type='tel' placeholder='Введите номер телефона *' name="phone[]" id='tel' onkeyup='filterList()'>
					</div>
					<div class="form_add_phone">
						<button type='button' class='btn' onclick='addPhoneInput()'>Добавить поле номера</button>
						<button type='button' class='btn' onclick='removePhoneInput()'>Удалить поле номера</button>
					</div>
					<div class="submit">
						<button type='submit' class='btn'>Отправить сообщение</button>
					</div>
				</div>	
		</form>
			</div>
		</div>
	</main>

	<footer>© 2023 SENDIT. Все права защищены.</footer>

	<!-- Скрипты -->
	<script src='scripts/script.js'></script>
	<script>
		function addPhoneInput() {
  			var container = document.getElementById("form_tel_phones");
  			var inputs = container.querySelectorAll('input[type="tel"]');
  			if (inputs.length < 5) {
    			var newInput = document.createElement("input");
    			newInput.type = "tel";
    			newInput.className = "input_tel_phones";
    			newInput.name = "phone[]";
    			newInput.placeholder = "Введите номер телефона";
    			container.appendChild(newInput);
  			} else {
    			alert("Вы достигли максимального количества инпутов (5).");
  			}
		}
		function removePhoneInput() {
  			var container = document.getElementById("form_tel_phones");
  			var inputs = container.querySelectorAll('input[type="tel"]');
  			if (inputs.length > 1) {
    		container.removeChild(inputs[inputs.length - 1]);
  			}
		}
	</script>
</body>
</html>

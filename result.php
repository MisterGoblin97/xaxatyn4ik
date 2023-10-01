<!DOCTYPE html>
<html lang='ru'>

<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>SENDIT - доставка сообщений</title>

	<!-- SEO -->
	<meta name='description' content='Доставка SMS в 2 клика'>
	<meta name='keywords' content='SENDIT, SMS, Summit, Сообщения, Рассылка'>
	<meta name='author' content='sendit'>
	<meta name='copyright' content='SENDIT'>
	<meta property='og:title' content='SENDIT - доставка сообщений'>
	<meta property='og:description' content='Доставка SMS в 2 клика'>
	<meta property='og:site_name' content='SENDIT - доставка сообщений'>
	<meta name='twitter:site' content='sendit'>
	<meta name='twitter:title' content='SENDIT - доставка сообщений'>
	<meta name='twitter:description' content='Доставка SMS в 2 клика'>

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

	
		<!-- Выравнивание кнопки пользователя -->
		<style>
			.account__outer {
				width: 100%;
			}

			.account {
				position: absolute;
				right: 0;
				z-index: 2;
				font-weight: 700;
				margin-right: 25px;
				padding: 30px 0;
				cursor: pointer;
			}

			@media (max-width: 50.85em) {
				.logo {
					position: absolute;
					left: 0;
				}

				.menu input {
					margin-top: 6rem;
					width: 100%;
				}
			}
		</style>

		<!-- Кнопка пользователя -->
		<div class='account__outer container'>
			<a class='account' href='index.html'>Выход</a>
		</div>


	<main>
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

		<section class='form__outer'>
			<div class='container'>

				<div class='main'>
					<h2>Результат выполнения:</h2>
		
				</div>

			</div>
		</section>
		
	</main>
	
	<footer>© 2023 SENDIT. Все права защищены.</footer>

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
    			alert("Вы достигли максимального количества инпутов (4).");
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

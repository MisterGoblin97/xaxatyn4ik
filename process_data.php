<?php
$db = new SQLite3("database.db");

// Значение общего сообщения
$message = $_POST['message'];

// Массив с номерами телефонов
$phones = $_POST['phone'];

// Адрес, на который будет отправлен запрос
$url = 'http://10.250.2.2:2050/api/Messages';
$responses = array();

foreach ($phones as $phone) {
    // Данные для запроса
    $data = array(
        'phone' => $phone,
        'message' => $message,
        'callback_url' => 'http://10.250.2.2:2050'
    );

    // Преобразуем данные в формат JSON
    $json_data = json_encode($data);

    // Настройки cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'accept: application/json',
        'Authorization: bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiIxMjBjYTliMS0wMWU2LTQ4MzktYjRmNS1jMDQ1NjA2MzU3NWEiLCJ1bmlxdWVfbmFtZSI6Imdyb3VwLjciLCJuYmYiOjE2OTM3NDg2MDksImV4cCI6MTcyNDg1MjYwOSwiaWF0IjoxNjkzNzQ4NjA5LCJpc3MiOiJodHRwczovL2RvYnJvemFpbS5ydS8iLCJhdWQiOiJodHRwczovL2RvYnJvemFpbS5ydS8ifQ.uOsswUhDQLzBfm1qEiL9vBKg7MaRD4V0bZnGU-heJkA',
        'Content-Type: application/json',
    ));

    // Выполнение запроса
    $response = curl_exec($ch);

    // Проверка на наличие ошибок
    if (curl_error($ch)) {
        echo 'Ошибка cURL: ' . curl_error($ch);
    } else {
        // Получение HTTP-кода ответа
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $response_data = json_decode($response, true);
        $responses[] = $response_data;

        // Сохранение HTTP-кода ответа
        $http_codes[] = $http_code;
        if ($http_code == 200) {
            // Запрос успешно выполнен
            // Проверка статуса отправки
            // Коннект к курлу
            $url_to_curl_ask = 'http://10.250.2.2:2050/api/Messages' . '/' . $response_data["id"];
            $curl_ask = curl_init($url_to_curl_ask);
            curl_setopt($curl_ask, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_ask, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl_ask, CURLOPT_POSTFIELDS, $response_data);
            curl_setopt($curl_ask, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Authorization: bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiIxMjBjYTliMS0wMWU2LTQ4MzktYjRmNS1jMDQ1NjA2MzU3NWEiLCJ1bmlxdWVfbmFtZSI6Imdyb3VwLjciLCJuYmYiOjE2OTM3NDg2MDksImV4cCI6MTcyNDg1MjYwOSwiaWF0IjoxNjkzNzQ4NjA5LCJpc3MiOiJodHRwczovL2RvYnJvemFpbS5ydS8iLCJhdWQiOiJodHRwczovL2RvYnJvemFpbS5ydS8ifQ.uOsswUhDQLzBfm1qEiL9vBKg7MaRD4V0bZnGU-heJkA',
                'Content-Type: application/json',
            ));

            // Выполнение запроса
            $response_to_status = curl_exec($curl_ask);

            // Получение требуемой информации
            $curl_to_status_res = curl_getinfo($curl_ask);
            $response_to_status = json_decode($response_to_status, true);
            if ($response_to_status["status"] == 'failure') {
                // запрос в бд sqlite
                $insert_query = "INSERT INTO history (phones, message, date, uuid, status) VALUES ('$phone', '$message', datetime('now', '3 hours'), '" . $response_data["id"] . "', 'Failure')";
                $db->exec($insert_query);
            } else {
                // запрос в бд склайт
                $insert_query = "INSERT INTO history (phone, message, date, uuid, status) VALUES ('$phone', '$message', datetime('now', '3 hours'), '" . $response_data["id"] . "', 'Success')";
                $db->exec($insert_query);
            }
        } else {
            // Произошла ошибка
             echo 'Произошла ошибка: ' . $http_code;
            if ($http_code == 401) {
                echo '<script>alert("Произошла ошибка авторизации, код 401");</script>';
                $array_of_failure[] = $phone;
            }
            if ($http_code == 429) {
                echo '<script>alert("Слишком много запросов в единицу времени, код 429");</script>';
                $array_of_failure[] = $phone;
            }
            if ($http_code == 500) {
                echo '<script>alert("Ошибка на стороне сервера код 500");</script>';
                $array_of_failure[] = $phone;
            }
            
        }
    }
    // Ждем 0.3 секунды перед следующим запросом (3.1 запроса в секунду)
    usleep(300000);

    // Закрытие cURL-сессии
    curl_close($ch);
}
header('location: history.php');
?>
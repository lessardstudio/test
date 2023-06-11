<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jura" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ajax@0.0.4/lib/ajax.min.js"></script>
    <title>Чайникoff.shop</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href='https://css.gg/css' rel='stylesheet'>
</head>
<body>



<header>
    <div class="container">
        <a href="#" class="logo" style="">Чайникoff.shop</a>
        <a href="#">Админка</a>
    </div>
</header>


<section class="admin">
    <div class="container">

    <?php
// Параметры подключения к базе данных
$servername = "127.0.0.1";//адрес сервера mysql
$username = "name";//изменить на название пользователя в pma
$password = "pass";//пасс от пользователя в pma
$dbname = "chainiki"; // название бд

// Создание подключения к базе данных

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// SQL-запрос для выборки данных
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Проверка наличия данных
if ($result->num_rows > 0) {
    // Вывод данных в цикле
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $status = ($row['status']) ? 'On': 'Off';


        echo "
        
        <div item-id=\"$id\" class=\"item\">
        <img src=\"/img/ch_1.jpg\" alt=\"Чайник\">
        <div class=\"text\">$name</div>|
        <div class=\"price\">$price</div> руб.
        <div class=\"buttons\">
            <div class=\"edit\"><i class=\"gg-pen\"></i></div>
            <div class=\"apply hide\"><i class=\"gg-check-o\"></i></div>
            <div class=\"visible\">
                Отображение:
                <input type=\"button\" value=\"$status\" class=\"onoff\">
            </div>
            <div class=\"delete\"><i class=\"gg-trash\"></i>Удалить</div>
        </div>
    </div>
        
        ";
    }
} else {
    echo "Нет данных";
}

// Закрытие соединения с базой данных
$conn->close();
?>

        
    </div>
</section>
<script src="/js/func.js"></script>
<script src="/js/main.js"></script>

    
</body>
</html>
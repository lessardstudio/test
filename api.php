
<?php 





function _get($action, $func){
	if ($_GET['action'] == $action){
		$func();
	}
}



_get('changeitem',function(){
	$itemId = $_GET['idItem'];
	$newText = $_GET['name'];
	$newPrice = $_GET['price'];
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

    $updateSql = "UPDATE `items` SET `price` = $newPrice , `name` = '$newText' WHERE `id` = '$itemId' LIMIT 1;";
        
	if ($conn->query($updateSql) === TRUE) {
		echo "Данные успешно обновлены для ID " . $itemId . "<br>";
	} else {
		echo "Ошибка обновления данных для ID " . $itemId . ": " . $conn->error . "<br>";
	}
	$conn->close();
});


_get('changestatus',function(){
	$newStatus = $_GET['status'];
	$itemId = $_GET['idItem'];

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "chainiki";
	// Создание подключения к базе данных
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8mb4");

	// Проверка соединения
	if ($conn->connect_error) {
		die("Ошибка подключения: " . $conn->connect_error);
	}

    $updateSql1 = "UPDATE `items` SET `status` = '$newStatus' WHERE `id` = '$itemId' LIMIT 1;";
	echo($updateSql1);
        
	if ($conn->query($updateSql1) === TRUE) {
		echo "Данные успешно обновлены для ID " . $itemId . "<br>";
	} else {
		echo "Ошибка обновления данных для ID " . $itemId . ": " . $conn->error . "<br>";
	}
	$conn->close();
});


_get('delete', function(){
	$itemId = $_GET['idItem'];
	if (!$itemId) {
		die();
	}

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "chainiki";
	// Создание подключения к базе данных
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8mb4");
	
	// Проверка соединения
	if ($conn->connect_error) {
		die("Ошибка подключения: " . $conn->connect_error);
	}

	// SQL-запрос для удаления данных
	$deleteSql = "DELETE FROM `items` WHERE `id` = $itemId LIMIT 1;";
			
	if ($conn->query($deleteSql) === TRUE) {
		echo "Данные успешно удалены для ID " . $itemId . "<br>";
	} else {
		echo "Ошибка удаления данных для ID " . $itemId . ": " . $conn->error . "<br>";
	}

	// Закрытие соединения с базой данных
	$conn->close();
});













?>



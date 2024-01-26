<?php
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$product = $_POST['product'];

$servername = "localhost";
$username = "root";
$password = "1vnk777";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
$guid = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "INSERT INTO orders (idorders, fullName, email, product) VALUES ('$guid', '$fullName', '$email', '$product')";
if ($conn->query($sql) === TRUE) {
    echo "Информация успешно сохранена в базе данных";
} else {
    echo "Ошибка при выполнении запроса: " . $conn->error;
}
$conn->close();
?>
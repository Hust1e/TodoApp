<?php 
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

try {
    // Данные для подключения
    $dsn = "pgsql:host=$_ENV[DATABASE_HOST];dbname=$_ENV[DATABASE_NAME]";
    $username = $_ENV['DATABASE_USER'];
    $password = $_ENV['DATABASE_PASSWORD'];

    // Подключение к базе данных
    $pdo = new PDO($dsn, $username, $password);

    // Установка режима обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Тестовый запрос
    $stmt = $pdo->query('SELECT version()');
    $result = $stmt->fetchColumn();

    echo "Connected successfully. Database version is: $result";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
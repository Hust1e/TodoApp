<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
class DatabaseConnectionTest extends PHPUnit\Framework\TestCase
{
   private $pdo;

   protected function setUp(): void
   {
       try {
            $dsn = "pgsql:host=$_ENV[DATABASE_HOST];dbname=$_ENV[DATABASE_NAME]";
            $username = $_ENV['DATABASE_USER'];
            $password = $_ENV['DATABASE_PASSWORD'];

           $this->pdo = new \PDO($dsn, $username, $password);
           $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       } catch (\PDOException $e) {
           $this->fail("Не удалось подключиться к базе данных: " . $e->getMessage());
       }
   }

   public function testSuccessfulConnection()
   {
       $this->assertNotNull($this->pdo, "Подключение к базе данных не было успешно установлено.");
   }

   protected function tearDown(): void
   {
       $this->pdo = null;
   }
}
?>

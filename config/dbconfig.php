
<?php
// pure php code
  
try {
    $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
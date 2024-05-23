<?php
 $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;

if(!$id){
    header('Location:index.php');
    exit;
}

$statment = $pdo->prepare('DELETE FROM companies WHERE id = :id');
$statment->bindValue(':id',$id);
$statment->execute();
header('Location:search.php')
?>
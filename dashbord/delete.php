<?php
require_once "../config/dbconfig.php";

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
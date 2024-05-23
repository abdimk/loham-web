<?php


$sqlitedb = new PDO('sqlite:db/companies.db');
$sqlitedb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT * FROM companies WHERE id = 1";
    
$stmt = $sqlitedb->prepare($sql);
$stmt->execute();
    
$result = $stmt->fetch(PDO::FETCH_ASSOC);
 

var_dump($result);
?>

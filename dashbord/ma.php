<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT count(*) FROM companies");
$stmt2 = $pdo->prepare("SELECT COUNT(DISTINCT categories) FROM companies");
$stmt3 = $pdo->prepare("SELECT COUNT(DISTINCT primary_category) FROM companies");

$stmt4 = $pdo->prepare("SELECT DISTINCT TRIM(categories) FROM companies;");


$stmt->execute();
$stmt2->execute();
$stmt3->execute();
$stmt4->execute();


$total_records = $stmt->fetchColumn();
$total_categories = $stmt2->fetchColumn();
$total_primary_category = $stmt3->fetchColumn();

$categories = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    var_dump($categories);


?>
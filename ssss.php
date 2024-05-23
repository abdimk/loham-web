<?php
function checkCridential($email){
    $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham','root','password');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $myquery = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $myquery->bindValue(':email', $email);
    $myquery->execute();

    $user = $myquery->fetch(PDO::FETCH_ASSOC);

    return !!$user; // Convert user data to boolean (true if user exists, false otherwise)
}



$row = [];
if(is_array($row) && empty($row)){
    echo "True";
}
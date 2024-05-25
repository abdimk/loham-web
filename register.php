<?php
try{
    $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham','root','password');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
}catch(\PDOException  $e){
    echo $e->getMessage();
}

function checkCridential($email){
    $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham','root','password');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $myquery = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $myquery->bindValue(':email', $email);
    $myquery->execute();

    $user = $myquery->fetch(PDO::FETCH_ASSOC);

    return !!$user; // Convert user data to boolean (true if user exists, false otherwise)
}

$username = '';
$email = '';
$date = '';
$errors = [];
$success = false;



if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $password = $_POST['password'];


    $Namepattern = '/^[a-zA-Z]+$/';
    if(!preg_match($Namepattern, $username)){
        $errors[] = 'The Name should only contain characters';
    }
    if(checkCridential($email)){
        $errors[] = 'The email has been used before';
    }

    if(strlen($password) < 8){
        $errors[] = 'The password should be minimum of 8 characters';
    }
    

    if(empty($errors)){
        $query = $pdo->prepare("INSERT INTO users (username,email,birthdate,password,image)
        VALUE (:username,:email,:birthdate,:password,:image)");

        $query->bindValue(':username',$username);
        $query->bindValue(':email',$email);
        $query->bindValue(':birthdate',$date);
        $query->bindValue(':password',$password);

        $query->bindValue(':image',NULL);
        $query->execute();
        sleep(2);
        header('Location: Login.php');
        exit();


        
    }
}



?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="/icon/icons8-l-64.png"type="image/x-icon">
</head>

<body>
    <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
        <?php foreach($errors as $error):?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
        </div>
    <?php endif;?>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" value="<?php echo $username?>" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" value="<?php echo $email?>" required>
                </div>

                <div class="field input">
                    <label for="date">Birth Date</label>
                    <input type="date" name="date" id="date" autocomplete="off" value="<?php echo $date?>" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" value="<?php echo $date?>" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn"name="submit" id="submit" value="Register" required>
                </div>

                <div class="links">
                    Already have account <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
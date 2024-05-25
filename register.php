<?php
session_start();

try {
    $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to create random strings
function randstring($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

// Function to check if the email is already registered
function checkCredential($pdo, $email) {
    $query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $query->bindValue(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return !!$user; // Convert user data to boolean (true if user exists, false otherwise)
}

$username = '';
$email = '';
$date = '';
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $password = $_POST['password'];
    
    

    // Validate inputs
    if (!preg_match('/^[a-zA-Z]+$/', $username)) {
        $errors[] = 'The Name should only contain characters';
    }
    if (checkCredential($pdo, $email)) {
        $errors[] = 'The email has been used before';
    }
    if (strlen($password) < 8) {
        $errors[] = 'The password should be a minimum of 8 characters';
    }
    if (empty($errors)) {
        // Create images directory if it doesn't exist
        if (!is_dir('images')) {
            mkdir('images');
        }

        // Handle file upload
        $image_path = $_POST['image'];
       // $image_path = '';
        //$image_path = 'images/' . randstring(8) . '/' .$image['name'];
        //mkdir(dirname($image_path), 0777, true);
        // if ($image && $image['name'] && $image['tmp_name']) {
          
            // move_uploaded_file($image['tmp_name'], $image_path);
        // }

        // Insert user into the database
        $query = $pdo->prepare("INSERT INTO users (username, email, birthdate, password, image) VALUES (:username, :email, :birthdate, :password, :image)");
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->bindValue(':birthdate', $date);
        $query->bindValue(':password', $password);
        $query->bindValue(':image', $image_path);
        $query->execute();

        // Redirect to the login page
        header('Location: login.php');
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
    <link href="css/login_style.css" rel="stylesheet">
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
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="image" value="../icon/userp.png">

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
<?php

session_start();

function checkCredentials($email) {
  $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM users WHERE email = :email";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email', $email);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

$email = '';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']); 
  $password = $_POST['password'];

  try {
    $dbuser = checkCredentials($email);
    if ($dbuser) { 
      if ($password === $dbuser['password']) { 

        $_SESSION['valid'] = $dbuser['email'];
        $_SESSION['user'] = $dbuser['username'];
        $_SESSION['password'] = $dbuser['password'];
        $_SESSION['image'] = $dbuser['image'];

        if(isset($_SESSION['valid'])){
          sleep(2);
          header('Location: dashbord/index.php');
        }
        //header('Location: Login.php');
        exit(); // Exit after successful login to prevent further code execution
      } else {
        $errors[] = 'Wrong password, please try again';
      }
    } else {
      $errors[] = 'No user found with that email';
    }
  } catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" value="<?php echo $email;?>" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" id="submit" value="Login">
                </div>

                <div class="links">
                    Don't you have an account? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

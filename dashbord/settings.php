<?php
session_start();
if (!isset($_SESSION['valid'])) {
    sleep(2);
    header('Location: ../login.php');
    exit();
}


function randstring($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$name = $_SESSION['user'];
$email = $_SESSION['valid'];
$password =$_SESSION['password'];

$sql = "SELECT * FROM users WHERE email = :email and password = :password";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);


$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);



$username = $user['username'];
$email = $user['email'];
$birthdate = $user['birthdate'];
$password = $user['password'];
$id = $user['id'];
$image_path = $user['image'];
$old_image_path = $image_path;


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['name']);
    $date = trim($_POST['date']);
    $password = $_POST['password'];
    // Validate inputs
    if (!preg_match('/^[a-zA-Z]+$/', $username)) {
        $errors[] = 'The Name should only contain characters';
    }
    if (strlen($password) < 8) {
        $errors[] = 'The password should be a minimum of 8 characters';
    }
    if (empty($errors)) {
        // Create images directory if it doesn't exist
        if (!is_dir('images')) {
            mkdir('images');
        }
    }
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
    
        if ($user['image']) {
            try {
                unlink($product['image']);
                $old_image_dir = dirname($user['image']);
                
                // Check if the directory is empty
                if (is_dir($old_image_dir) && count(glob("$old_image_dir/*")) === 0) {
                    // If directory is empty, remove it
                    rmdir($old_image_dir);
                }
            } catch (Exception $e) {
                // Handle unlinking errors here
            }
        }
    
        $image_path = 'images/' . randstring(8) . '/' . $image['name'];
    
        mkdir(dirname($image_path), 0777, true);
    
        move_uploaded_file($image['tmp_name'], $image_path);
    }
    if (empty($errors)) {
        $query = $pdo->prepare("UPDATE users SET username = :username, birthdate = :date, password = :password, image = :image WHERE id = :id");

        $query->bindValue(':username', $username);
        $query->bindValue(':image', $image_path);
        $query->bindValue(':date', $date);
        $query->bindValue(':password', $password);
        $query->bindValue(':id', $id);

        $query->execute();
        $_SESSION['user'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['image'] = $image_path;
        
        // Redirect to index.php after successful update
        header('Location: settings.php');
        exit;

    }



}


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loham Main</title>
    <!-- box icons link -->
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="/icon/icons8-l-64.png"type="image/x-icon">
    <link rel="stylesheet" href="settings.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span> <i class='bx bxl-java-script'></i></span>
            <span class="logo_name">Loham</span>
        </div>
        <ul class="nav-links">
            <li class="">
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashbord</span>
                </a>
            </li>
            <li class="">
                <a href="search.php">
                    <i class='bx bx-box'></i>
                    <span class="link_name">Search</span>
                </a>
            </li>
            <li class="">
                <a href="category.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="link_name">All Catagories</span>
                </a>
            </li>
            <li class="">
                <a href="api.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="link_name">Documentaion</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
            </li>
            <li class="">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log out</span>

                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashbord">Settings</span>
            </div>

            <div class="profile-details">
                <img src="<?php echo $image_path;?>" alt="">
                <span class="admin_name"><?php echo ucfirst($username) ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <!-- home content -->
        <div class="home-content">

    <div class="settings-container">
        <div class="profile-picture">
            <img src="<?php echo $image_path;?>" alt="Profile Picture">
        </div>
        <h2><?php echo ucfirst($username) ?></h2>
        <p class="email-handler"><?php echo $email;?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label_name" for="profileImage">Change Profile Image</label>
                <label for="profileImage" class="custom-file-upload">Choose File</label>
                <input type="file" id="profileImage" name="image" onchange="displayFileName()">
                <div id="file-name" class="file-name"></div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" value="<?php echo $username;?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" value="<?php echo $password;?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $birthdate;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Save Changes</button>
            </div>
        </form>
    </div>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="my_chart.js"></script>
    <script>
        function displayFileName() {
            var input = document.getElementById('profileImage');
            var fileName = input.files[0].name;
            document.getElementById('file-name').textContent = 'File: ' + fileName;
        }
    </script>
</body>

</html>
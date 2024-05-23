<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$email = 'abdisa@gmail.com';
$password = 'merga123';


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
$image = $user['image'];



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
                <a href="Category.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="link_name">All Catagories</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class='bx bx-coin-stack'></i>
                    <span class="link_name">Documentaion</span>
                </a>
            </li>

            <!-- <li class="">
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="link_name">Favorites</span>
                </a>
            </li> -->
            <li class="">
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
            </li>

            <li class="">
                <a href="developers.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Developers</span>
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
                <img src="assets/profiles/profile.jpg" alt="">
                <!-- <span class="admin_name"> echo ucfirst($name);</span> -->
                <span class="admin_name"><?php echo ucfirst($username) ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <!-- home content -->
        <div class="home-content">

    <div class="settings-container">
        <div class="profile-picture">
            <img src="https://via.placeholder.com/100" alt="Profile Picture">
        </div>
        <h2><?php echo ucfirst($username) ?></h2>
        <p class="email-handler"><?php echo $email;?></p>
        <form>
            <div class="form-group">
                <label class="label_name" for="profileImage">Change Profile Image</label>
                <label for="profileImage" class="custom-file-upload">Choose File</label>
                <input type="file" id="profileImage" name="profileImage" onchange="displayFileName()">
                <div id="file-name" class="file-name"></div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" value="<?php echo $username;?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" value="<?php echo $password;?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $username;?>">
            </div>
            <div class="form-group">
                <button type="submit">Save Changes</button>
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
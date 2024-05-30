<?php


require_once "../assets/session_start.php";


$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT count(*) FROM companies");
$stmt2 = $pdo->prepare("SELECT COUNT(DISTINCT categories) FROM companies");
$stmt3 = $pdo->prepare("SELECT COUNT(DISTINCT primary_category) FROM companies");

$stmt4 = $pdo->prepare("SELECT categories, COUNT(*) AS record_count FROM companies GROUP BY categories");


$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$number_of_searches = $pdo->prepare("SELECT no_of_searches, search_day, search_date FROM searches WHERE user_id = :id LIMIT 5");
$number_of_searches->bindValue(':id', 23, PDO::PARAM_INT);
$account_search = $pdo->prepare("SELECT no_of_searches, search_day, search_date FROM searches WHERE user_id = :id");
$account_search->bindValue(':id', 23, PDO::PARAM_INT);


$da = $pdo->prepare("SELECT  search_day FROM searches WHERE user_id = :id");
$da->bindValue(':id', 23, PDO::PARAM_INT);


$account_search->execute();
$number_of_searches->execute();
$da->execute();

$aac = $account_search->fetchAll(PDO::FETCH_ASSOC);
$searches = $number_of_searches->fetch(PDO::FETCH_ASSOC);

$days = $da->fetchAll(PDO::FETCH_ASSOC);
$dd = end($days);


$stmt->execute();
$stmt2->execute();
$stmt3->execute();
$stmt4->execute();


$total_records = $stmt->fetchColumn();
$total_categories = $stmt2->fetchColumn();
$total_primary_category = $stmt3->fetchColumn();


$categories = $stmt4->fetchAll(PDO::FETCH_ASSOC);



// user stuff 




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loham Main</title> 
    <!-- box icons link -->
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="/icon/icons8-l-64.png"type="image/x-icon">
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
           <span> <i class='bx bxl-java-script'></i></span>
            <span class="logo_name">Loham</span>
        </div>
        <ul class="nav-links">
            <li class="">
                <a href="#">
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

            <!-- <li class="">
                <a href="#">
                   <i class='bx bx-heart'></i>
                    <span class="link_name">Favorites</span>
                </a>
            </li> -->
            <li class="">
                <a href="settings.php">
                   <i class='bx bx-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
            </li>

            <!-- <li class="">
                <a href="developers.php">
                   <i class='bx bx-user'></i>
                    <span class="link_name">Developers</span>
                </a>
            </li> -->

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
                <span class="dashbord">Dashbord</span>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class="bx bx-search"></i>
            </div> -->
            <div class="profile-details">
                <img src="<?php echo $image;?>" alt="">
                <span class="admin_name"><?php echo ucfirst($name);?></span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <!-- home content -->
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Total Records</div>
                        <div class="number"><?php echo $total_records;?></div>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Last update <strong>yesterday</strong></span>
                        </div>
                    </div>
                    <i class="bx bxs-cart-alt cart"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Total Categories</div>
                        <div class="number"><?php echo $total_categories;?></div>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Last update <strong>yesterday</strong></span>
                        </div>
                    </div> 
                    <i class="bx bxs-cart-add cart two"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Primary Catagories</div>
                        <div class="number"><?php echo $total_primary_category;?></div>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt down"></i>
                            <span class="text">Last update <strong>yesterday</strong></span>
                        </div>
                    </div>
                    <i class="bx bxs-cart cart three"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Request Sent</div>
                        <div class="number"><?php echo $searches['no_of_searches']?></div>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Last Sent <strong><?php echo $dd['search_day'];?></strong></span>
                        </div>
                    </div>
                    <i class="bx bxs-cart-download cart four"></i>
                </div>
            </div>



            <!-- Adding Chart -->

            <div class="graphBox">
                
                <div class="box">
                    <canvas id="myChart2" width="300" height="310"></canvas>
                    <script>
                        const categories = <?php echo json_encode($categories); ?>;
                    </script>
                </div>
                <div class="box">
                    <canvas id="myChart" width="400" height="180"></canvas>
                    <script>
                        const searchDates = <?php echo json_encode($aac); ?>;
                    </script>
                </div>
            </div>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/my_chart.js"></script>
</body>
</html>
<?php
 
// Establish database connection
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM companies WHERE categories = 'Commercial Agent'");
$statement->execute();
$companies = $statement->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['category']) && isset($_POST['value'])) {
        $category = htmlspecialchars($_POST['category']);
        $value = htmlspecialchars($_POST['value']);
        echo "Received category: $category and value: $value";
    } else {
        echo "Category or value not received";
    }
    exit; // Stop further execution to prevent sending HTML content
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loham</title>
    <!-- box icons link -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <a href="#">
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

            <li class="">
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Developers</span>
                </a>
            </li>

            <li class="">
                <a href="#">
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
                <span class="dashbord">All Catagories</span>
            </div>

            <div class="profile-details">
                <img src="assets/profiles/profile.jpg" alt="">
                <span class="admin_name">Netkas</span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <!-- home content -->
        <div class="home-content">
            <div class="containu">
              

    <div class="tabs">
        <div class="tab" onclick="openTab('tab1')">Categories</div>

        <div id="tab1" class="tab-content active">
            <div class="card-container">
                        <!-- <div class="mycard" data-category="Agriculture" onclick="openTab('tab2')"> -->
                        <div class="mycard" data-category="Agriculture" onclick="handleCardClick('Agriculture', 'cv')">
                            <img src="https://img.icons8.com/?size=100&id=80392&format=png&color=000000" alt="Agriculture Logo">
                            <div class="card-title">Agriculture</div>
                        </div>
                <div class="mycard" onclick="openTab('tab3')">
                    <img src="https://img.icons8.com/?size=100&id=111278&format=png&color=000000" alt="Ecommerce Logo">
                    <div class="card-title">Automotive</div>
                </div>
                <div class="mycard" onclick="openTab('tab4')">
                    <img src="https://img.icons8.com/?size=100&id=63530&format=png&color=000000"alt="Placeholder Logo">
                    <div class="card-title">Banking</div>
                </div>
                <div class="mycard" onclick="openTab('tab5')">
                    <img src="https://img.icons8.com/?size=100&id=5LKlbOOI7Uof&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Agent</div>
                </div>
                
                <div class="mycard" onclick="openTab('tab6')">
                    <img src="https://img.icons8.com/?size=100&id=11881&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Broker</div>
                </div>

                <div class="mycard" onclick="openTab('tab7')">
                    <img src="https://img.icons8.com/?size=100&id=wsJ0SwpATGwZ&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Representative</div>
                </div>

                <div class="mycard" onclick="openTab('tab8')">
                    <img src="https://img.icons8.com/?size=100&id=12313&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commission Agent</div>
                </div>

                <div class="mycard" onclick="openTab('tab9')">
                    <img src="https://img.icons8.com/?size=100&id=33909&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Construction</div>
                </div>

                <div class="mycard" onclick="openTab('tab10')">
                    <img src="https://img.icons8.com/?size=100&id=41237&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Engineering</div>
                </div>


                <div class="mycard" onclick="openTab('tab11')">
                    <img src="https://img.icons8.com/?size=100&id=vo1XcGH8QAag&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Education</div>
                </div>


                <div class="mycard" onclick="openTab('tab12')">
                    <img src="https://img.icons8.com/?size=100&id=12098&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Electric Power Supply</div>
                </div>


                <div class="mycard" onclick="openTab('tab13')">
                    <img src="https://img.icons8.com/?size=100&id=11913&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Embassy</div>
                </div>
                <div class="mycard" onclick="openTab('tab14')">
                    <img src="https://img.icons8.com/?size=100&id=13525&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Exporters</div>
                </div>
                <div class="mycard" onclick="openTab('tab15')">
                    <img src="https://img.icons8.com/?size=100&id=12207&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Importers</div>
                </div>
                <div class="mycard" onclick="openTab('tab16')">
                    <img src="https://img.icons8.com/?size=100&id=13826&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Manufacturers</div>
                </div>
                <div class="mycard" onclick="openTab('tab17')">
                    <img src="https://img.icons8.com/?size=100&id=104081&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Service Providers</div>
                </div>
                <div class="mycard" onclick="openTab('tab18')">
                    <img src="https://img.icons8.com/?size=100&id=15133&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Export</div>
                </div>
                <div class="mycard" onclick="openTab('tab19')">
                    <img src="https://img.icons8.com/?size=100&id=G9aQlVzIT6H5&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Food and Beverage</div>
                </div>
                <div class="mycard" onclick="openTab('tab20')">
                    <img src="https://img.icons8.com/?size=100&id=ZUPIPzBFPl1X&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Foreign Suppliers to Ethiopia</div>
                </div>
                <div class="mycard" onclick="openTab('tab21')">
                    <img src="https://img.icons8.com/?size=100&id=114447&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Government</div>
                </div>
                <div class="mycard" onclick="openTab('tab22')">
                    <img src="https://img.icons8.com/?size=100&id=14799&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Health</div>
                </div>
                <div class="mycard" onclick="openTab('tab23')">
                    <img src="https://img.icons8.com/?size=100&id=12350&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Hotel and Resort</div>
                </div>
                <div class="mycard" onclick="openTab('tab24')">
                    <img src="https://img.icons8.com/?size=100&id=31928&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Hotels and Restaurants, Tour and Travel</div>
                </div>
                <div class="mycard" onclick="openTab('tab25')">
                    <img src="https://img.icons8.com/?size=100&id=102549&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">IT</div>
                </div>
                <div class="mycard" onclick="openTab('tab26')">
                    <img src="https://img.icons8.com/?size=100&id=aemAJ33A8uDo&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Import</div>
                </div>
                <div class="mycard" onclick="openTab('tab27')">
                    <img src="https://img.icons8.com/?size=100&id=16231&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Insurance Brokerage</div>
                </div>
                <div class="mycard" onclick="openTab('tab28')">
                    <img src="https://img.icons8.com/?size=100&id=22998&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Manufacturing</div>
                </div>
                <div class="mycard" onclick="openTab('tab29')">
                    <img src="https://img.icons8.com/?size=100&id=u80MJuO-mFwF&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Media and Advertising</div>
                </div>
                <div class="mycard" onclick="openTab('tab30')">
                    <img src="https://img.icons8.com/?size=100&id=T1nBDle_LNtq&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Recreation and Entertainment</div>
                </div>
                <div class="mycard" onclick="openTab('tab31')">
                    <img src="https://img.icons8.com/?size=100&id=103938&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Service</div>
                </div>
                <div class="mycard" onclick="openTab('tab32')">
                    <img src="https://img.icons8.com/?size=100&id=64550&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Share Market for Insurance Shares and Bank Shares</div>
                </div>
                <div class="mycard" onclick="openTab('tab33')">
                    <img src="https://img.icons8.com/?size=100&id=11881&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Social Enterprises</div>
                </div>
                <div class="mycard" onclick="openTab('tab34')">
                    <img src="https://img.icons8.com/?size=100&id=7CmJjUTjKpD5&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Social and Service</div>
                </div>
                <div class="mycard" onclick="openTab('tab35')">
                    <img src="https://img.icons8.com/?size=100&id=17569&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Tour and Travel</div>
                </div>
                <div class="mycard" onclick="openTab('tab36')">
                    <img src="https://img.icons8.com/?size=100&id=HOaunZsdV3cV&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Trade</div>
                </div>
                <div class="mycard" onclick="openTab('tab37')">
                    <img src="https://img.icons8.com/?size=100&id=11869&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Transport</div>
                </div>
                <div class="mycard" onclick="openTab('tab38')">
                    <img src="https://img.icons8.com/?size=100&id=ThrCWrDxDa0v&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Transport, Storage and Communication</div>
                </div>

                
                <!-- Add more cards as needed -->
            </div>
        </div>

    <div id="tab2" class="tab-content tab2">
    <div class="cards-container">
        <?php echo $_POST['value']?>
    <!-- php foreach($companies as $company){ ?>    
                <div class="company-card">
                <div class="company-info">
                    <h2 class="company-name"><?php echo $company['company_name']; ?></h2>
                    <p class="company-location">
                        <img src="https://img.icons8.com/?size=100&id=13800&format=png&color=000000" alt="Location Icon" class="icon"> <?php echo $company['location']; ?>
                    </p>
                    <p class="company-phone">
                        <img src="https://img.icons8.com/?size=100&id=12921&format=png&color=000000" alt="Phone Icon" class="icon"> <?php echo $company['phone_number']; ?>
                    </p>
                    <p class="company-fax">
                        <img src="https://img.icons8.com/?size=100&id=19660&format=png&color=000000" alt="Fax Icon" class="icon"> <?php echo $company['fax']; ?>
                    </p>
                    <p class="company-category">
                        <img src="https://img.icons8.com/?size=100&id=12368&format=png&color=000000" alt="Category Icon" class="icon"> <?php echo $company['primary_category']; ?>
                    </p>
                    <p class="company-email">
                        <img src="https://img.icons8.com/?size=100&id=13826&format=png&color=000000" alt="Email Icon" class="icon"> Email: <a href="mailto:<?php echo $company['Email']; ?>"><?php echo $company['Email']; ?></a>
                    </p>
                </div>
            
                </div>
        php } ?> -->
    </div>
</div>


                <!-- Add more company-card divs as needed -->
            </div>
            

        </div>
    </div>

    <script>
                function handleCardClick(category, value) {
                $.ajax({
                    type: 'POST',
                    url: '', // Same PHP file
                    data: {
                        category: category,
                        value: value
                    },
                    success: function(response) {
                        console.log('Success:', response);
                        // Handle the response data here
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', status, error);
                    }
                });
            }
                 function openTab(tabName) {
                    // Hide all tab contents
                    // handleCardClick('Agriculture', 'cv');
                    var tabContents = document.getElementsByClassName('tab-content');
                    for (var i = 0; i < tabContents.length; i++) {
                        tabContents[i].classList.remove('active');
                    }

                    // Show the selected tab content
                    document.getElementById(tabName).classList.add('active');
                }

                

    </script>
                
                
            </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="script.js"></script>
</body>

</html>
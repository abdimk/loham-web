<?php
 session_start();
 if (!isset($_SESSION['valid'])) {
     sleep(2);
     header('Location: ../login.php');
     exit();
 }
 
 $name = $_SESSION['user'];
 $email = $_SESSION['valid'];
 $image = $_SESSION['image'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loham</title>
    <!-- box icons link -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/categorymain.css">
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
<!-- 
            <li class="">
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Developers</span>
                </a>
            </li> -->

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
                <img src="<?php echo $image;?>" alt="">
                <span class="admin_name"><?php echo ucfirst($name);?></span>
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
                        <div class="mycard" data-category="Agriculture" onclick="openTab('tab2', 'Agriculture')" >
                            <img src="https://img.icons8.com/?size=100&id=80392&format=png&color=000000" alt="Agriculture Logo">
                            <div class="card-title">Agriculture</div>
                        </div>

                <div class="mycard" onclick="openTab('tab2', 'Automotive')">
                    <img src="https://img.icons8.com/?size=100&id=111278&format=png&color=000000" alt="Ecommerce Logo">
                    <div class="card-title">Automotive</div>
                </div>

                <div class="mycard" onclick="openTab('tab2', 'Banking')">
                    <img src="https://img.icons8.com/?size=100&id=63530&format=png&color=000000"alt="Placeholder Logo">
                    <div class="card-title">Banking</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Commercial Agent')">
                    <img src="https://img.icons8.com/?size=100&id=5LKlbOOI7Uof&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Agent</div>
                </div>
                
                <div class="mycard" onclick="openTab('tab2', 'Commercial Broker')">
                    <img src="https://img.icons8.com/?size=100&id=11881&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Broker</div>
                </div>

                <div class="mycard" onclick="openTab('tab2', 'Commercial Representative')">
                    <img src="https://img.icons8.com/?size=100&id=wsJ0SwpATGwZ&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commercial Representative</div>
                </div>

                <div class="mycard" onclick="openTab('tab2', 'Commission Agent')">
                    <img src="https://img.icons8.com/?size=100&id=12313&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Commission Agent</div>
                </div>

                <div class="mycard" onclick="openTab('tab2', 'Construction')">
                    <img src="https://img.icons8.com/?size=100&id=33909&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Construction</div>
                </div>

                <div class="mycard" onclick="openTab('tab2', 'Engineering')">
                    <img src="https://img.icons8.com/?size=100&id=41237&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Engineering</div>
                </div>


                <div class="mycard" onclick="openTab('tab2', 'Education')">
                    <img src="https://img.icons8.com/?size=100&id=vo1XcGH8QAag&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Education</div>
                </div>


                <div class="mycard" onclick="openTab('tab2', 'Electric Power Supply')">
                    <img src="https://img.icons8.com/?size=100&id=12098&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Electric Power Supply</div>
                </div>


                <div class="mycard" onclick="openTab('tab2', 'Embassy')">
                    <img src="https://img.icons8.com/?size=100&id=11913&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Embassy</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Ethiopian Exporters')">
                    <img src="https://img.icons8.com/?size=100&id=13525&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Exporters</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Ethiopian Importers')">
                    <img src="https://img.icons8.com/?size=100&id=12207&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Importers</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Ethiopian Manufacturers')">
                    <img src="https://img.icons8.com/?size=100&id=13826&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Manufacturers</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Ethiopian Service Providers')">
                    <img src="https://img.icons8.com/?size=100&id=104081&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Ethiopian Service Providers</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Export')">
                    <img src="https://img.icons8.com/?size=100&id=15133&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Export</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Food and Beverage')">
                    <img src="https://img.icons8.com/?size=100&id=G9aQlVzIT6H5&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Food and Beverage</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Foreign Suppliers to Ethiopia')">
                    <img src="https://img.icons8.com/?size=100&id=ZUPIPzBFPl1X&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Foreign Suppliers to Ethiopia</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Government')">
                    <img src="https://img.icons8.com/?size=100&id=114447&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Government</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Health')">
                    <img src="https://img.icons8.com/?size=100&id=14799&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Health</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Hotel and Resort')">
                    <img src="https://img.icons8.com/?size=100&id=12350&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Hotel and Resort</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Hotels and Restaurants, Tour and Travel')">
                    <img src="https://img.icons8.com/?size=100&id=31928&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Hotels and Restaurants, Tour and Travel</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'IT')">
                    <img src="https://img.icons8.com/?size=100&id=102549&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">IT</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Import')">
                    <img src="https://img.icons8.com/?size=100&id=aemAJ33A8uDo&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Import</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Insurance Brokerage')">
                    <img src="https://img.icons8.com/?size=100&id=16231&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Insurance Brokerage</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Manufacturing')">
                    <img src="https://img.icons8.com/?size=100&id=22998&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Manufacturing</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Media and Advertising')">
                    <img src="https://img.icons8.com/?size=100&id=u80MJuO-mFwF&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Media and Advertising</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Recreation and Entertainment')">
                    <img src="https://img.icons8.com/?size=100&id=T1nBDle_LNtq&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Recreation and Entertainment</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Service')">
                    <img src="https://img.icons8.com/?size=100&id=103938&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Service</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Share Market for Insurance Shares and Bank Shares')">
                    <img src="https://img.icons8.com/?size=100&id=64550&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Share Market for Insurance Shares and Bank Shares</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Social Enterprises')">
                    <img src="https://img.icons8.com/?size=100&id=11881&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Social Enterprises</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Social and Service')">
                    <img src="https://img.icons8.com/?size=100&id=7CmJjUTjKpD5&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Social and Service</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Tour and Travel')">
                    <img src="https://img.icons8.com/?size=100&id=17569&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Tour and Travel</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Trade')">
                    <img src="https://img.icons8.com/?size=100&id=HOaunZsdV3cV&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Trade</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Transport')">
                    <img src="https://img.icons8.com/?size=100&id=11869&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Transport</div>
                </div>
                <div class="mycard" onclick="openTab('tab2', 'Transport, Storage and Communication')">
                    <img src="https://img.icons8.com/?size=100&id=ThrCWrDxDa0v&format=png&color=000000" alt="Placeholder Logo">
                    <div class="card-title">Transport, Storage and Communication</div>
                </div>

                
                <!-- Add more cards as needed -->
            </div>
        </div>



        <div id="tab2" class="tab-content tab2">
        <div class="cards-container">
            <h2 id="output"></h2>
        </div>
        </div>



                <!-- Add more company-card divs as needed -->
         </div>
            

        </div>
    </div>

    <script>
             function openTab(tabName, category) {
                // Hide all tab content
                var tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(function(tabContent) {
                    tabContent.classList.remove('active');
                });

                // Show the selected tab content
                var tabContent = document.getElementById(tabName);
                tabContent.classList.add('active');

                if (tabName === 'tab2') {
                    fetchCompanies(category);
                }
        }

    function fetchCompanies(category) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the tab content with the fetched data
                    document.getElementById('output').innerHTML = xhr.responseText;
                } else {
                    console.error('Error fetching companies:', xhr.status);
                }
            }
        };

        // Send AJAX request to PHP script
        xhr.open('GET', 'fetch_companies.php?category=' + encodeURIComponent(category), true);
        xhr.send();
    }



                

                

    </script>
                
                
            </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>
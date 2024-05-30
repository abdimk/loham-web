<?php

require_once "../assets/session_start.php";

// Initialize variables with empty strings
$company_name = $phone_number = $mobile = $fax = $subcity = $business_type = $location = $url = $email = $mobile2 = $primary_category = $category = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Assign values from POST data to variables
    $company_name = $_POST['company_name'];
    $phone_number = $_POST['phone_number'];
    $mobile = $_POST['mobile'];
    $fax = $_POST['fax'];
    $subcity = $_POST['subcity'];
    $business_type = $_POST['business_type'];
    $location = $_POST['location'];
    $url = $_POST['url'];
    $email = $_POST['email'];
    $mobile2 = $_POST['mobile2'];
    $primary_category = $_POST['primary_category'];
    $category = $_POST['category'];
    
    // Establish database connection
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO companies(company_name, phone_number, mobile, fax, sub_city, business_type, location, url, primary_category, categories, Mobile2, Email)
            VALUES(:company_name, :phone_number, :mobile, :fax, :subcity, :business_type, :location, :url, :primary_category, :category, :Mobile2, :Email)
    ");

    // Bind values to placeholders
    $stmt->bindValue(':company_name', $company_name);
    $stmt->bindValue(':phone_number', $phone_number);
    $stmt->bindValue(':mobile', $mobile);
    $stmt->bindValue(':fax', $fax);
    $stmt->bindValue(':subcity', $subcity);
    $stmt->bindValue(':business_type', $business_type);
    $stmt->bindValue(':location', $location);
    $stmt->bindValue(':url', $url);
    $stmt->bindValue(':primary_category', $primary_category);
    $stmt->bindValue(':category', $category);
    $stmt->bindValue(':Mobile2', $mobile2);
    $stmt->bindValue(':Email', $email);

    // Execute the prepared statement
    $stmt->execute();
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
    <link rel="stylesheet" href="../css/styles.css">
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
                <a href="#">
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
                <span class="dashbord">Search</span>
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
            <div class="containu">
               

                <div class="tabs">

                  

                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
                    <label for="tab1" class="tabs__label">Search</label>
                    <div class="tabs__content">
                        <h4>What are you looking for ?</h4>
                        <input type="text" class="form-control" id="live_search" autocomplete="off"
                            placeholder="Live Search...">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>Location</th>
                                    <th>categories</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                            </tbody>
                        </table>







                    </div>
                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
                    <label for="tab2" class="tabs__label">Add Companies</label>
                    <div class="tabs__content">
                        <div class="registration">
                            <header>Registration</header>
                            <form action="#" method="post" >
                                <div class="form first">
                                    <div class="details personal">
                                        <span class="title">Detail Information</span>


                                        <div class="fileds">



                                            <div class="input-field">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" placeholder="Name of thecompany" autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Phone Number</label>
                                                <input type="text" name ="phone_number" placeholder="Phone Number" autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Mobile</label>
                                                <input type="text" name ="mobile" placeholder="Mobile Number" autocomplete="off">
                                            </div>

                                            <div class="input-field">
                                                <label>Fax</label>
                                                <input type="text" name="fax" placeholder="Fax" autocomplete="off" >
                                            </div>

                                            <div class="input-field">
                                                <label>Sub City</label>
                                                <input type="text" name="subcity" placeholder="Sub City" autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Business Type</label>
                                                <input type="text" name="business_type" placeholder="Business Type for the company" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Location</label>
                                                <input type="text" name="location" placeholder="Location of the company" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Website</label>
                                                <input type="text" name="url" placeholder="Website / url of the company" autocomplete="off" >
                                            </div>

                                        </div>
                                        <div class="form first">
                                            <div class="details personal">
                                                <span class="title">Required Information</span>
                                                
                                        <div class="fileds">



                                            <div class="input-field">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email of the company" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Mobile2</label>
                                                <input type="text" name="mobile2" placeholder="Additional Mobile2" autocomplete="off">
                                            </div>

                                            <div class="input-field">
                                                <label>Primary Category</label>
                                                <input type="text" name="primary_category" placeholder="Primary Category" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Categories</label>
                                                <select id="category-select" name="category" onchange="changeCategory(this.value)">
                                                <option value="Agriculture">Agriculture</option>
                                                <option value="Automotive">Automotive</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Commercial Agent">Commercial Agent</option>
                                                <option value="Commercial Broker">Commercial Broker</option>
                                                <option value="Commercial Representative">Commercial Representative</option>
                                                <option value="Commission Agent">Commission Agent</option>
                                                <option value="Construction">Construction</option>
                                                <option value="Construction and Engineering">Construction and Engineering</option>
                                                <option value="Education">Education</option>
                                                <option value="Electric Power Supply">Electric Power Supply</option>
                                                <option value="Embassy">Embassy</option>
                                                <option value="Ethiopian Exporters">Ethiopian Exporters</option>
                                                <option value="Ethiopian Importers">Ethiopian Importers</option>
                                                <option value="Ethiopian Manufacturers">Ethiopian Manufacturers</option>
                                                <option value="Ethiopian Service Providers">Ethiopian Service Providers</option>
                                                <option value="Export">Export</option>
                                                <option value="Food and Beverage">Food and Beverage</option>
                                                <option value="Foreign Suppliers to Ethiopia">Foreign Suppliers to Ethiopia</option>
                                                <option value="Government">Government</option>
                                                <option value="Health">Health</option>
                                                <option value="Hotel and Resort">Hotel and Resort</option>
                                                <option value="Hotels and Restaurants, Tour and Travel">Hotels and Restaurants, Tour and Travel</option>
                                                <option value="IT">IT</option>
                                                <option value="Import">Import</option>
                                                <option value="Insurance Brokerage">Insurance Brokerage</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="Media and Advertising">Media and Advertising</option>
                                                <option value="Recreation and Entertainment">Recreation and Entertainment</option>
                                                <option value="Service">Service</option>
                                                <option value="Share Market for Insurance Shares and Bank Shares">Share Market for Insurance Shares and Bank Shares</option>
                                                <option value="Social Enterprises">Social Enterprises</option>
                                                <option value="Social and Service">Social and Service</option>
                                                <option value="Tour and Travel">Tour and Travel</option>
                                                <option value="Trade">Trade</option>
                                                <option value="Transport">Transport</option>
                                                <option value="Transport, Storage and Communication">Transport, Storage and Communication</option>
                                            </select>

                                            </div>
                                                
                                            </div>
                                        </div>
                                    

                                    </div>
                                </div>
                                <input type="submit" class="submit-button" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keypress(function () {
                $.ajax({
                    type: 'POST',
                    url: '../config/live.php',
                    data: {
                        name: $("#live_search").val(),
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                });
            });
        });
    </script>

    <script src="script.js"></script>
</body>

</html>
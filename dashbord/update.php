<?php
$company_name = $phone_number = $mobile = $fax = $subcity = $business_type = $location = $url = $email = $mobile2 = $primary_category = $category = "";

$id = $_GET['id'] ?? null;
if($id){
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $comp = $stmt->fetch(PDO::FETCH_ASSOC);

    $company_name = $comp['company_name'];
    $phone_number = $comp['phone_number'];
    $mobile =$comp['mobile'];
    $fax = $comp['fax'];
    $subcity = $comp['sub_city'];
    $business_type = $comp['business_type'];
    $location = $comp['location'];
    $url = $comp['url'];
    $email = $comp['Email'];
    $mobile2 = $comp['Mobile2'];
    $primary_category = $comp['primary_category'];
    $category = $comp['categories'];
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
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
   

    // Connect to the database
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $pdo->prepare("UPDATE companies SET company_name = :company_name, phone_number = :phone_number, mobile = :mobile, fax = :fax, sub_city = :sub_city, business_type = :business_type, location = :location, url = :url, primary_category = :primary_category, categories = :categories, Mobile2 = :Mobile2, Email = :Email WHERE id = :id");

    // Bind values to the statement
    $stmt->bindValue(':company_name', $company_name);
    $stmt->bindValue(':phone_number', $phone_number);
    $stmt->bindValue(':mobile', $mobile);
    $stmt->bindValue(':fax', $fax);
    $stmt->bindValue(':sub_city', $subcity);
    $stmt->bindValue(':business_type', $business_type);
    $stmt->bindValue(':location', $location);
    $stmt->bindValue(':url', $url);
    $stmt->bindValue(':primary_category', $primary_category);
    $stmt->bindValue(':categories', $category);
    $stmt->bindValue(':Mobile2', $mobile2);
    $stmt->bindValue(':Email', $email);
    $stmt->bindValue(':id', $id); // Ensure this matches the placeholder in the query

    // Execute the statement
    $stmt->execute();
    header('Location:search.php');
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
    <link rel="stylesheet" href="../css/update.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                    <span class="link_name">Analytics</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">API</span>
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
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Total order</span>
                </a>
            </li>

            <li class="">
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="link_name">Favorites</span>
                </a>
            </li>
            <li class="">
                <a href="#">
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
                <span class="dashbord">Update</span>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class="bx bx-search"></i>
            </div> -->
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

                
                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab2" checked>
                    <label for="tab2" class="tabs__label"></label>
                    <div class="tabs__content">
                        <div class="registration">
                            <header>Update Information</header>
                            <form action="#" method="post" >
                                <div class="form first">
                                    <div class="details personal">
                                        <span class="title">Detail Information</span>


                                        <div class="fileds">



                                            <div class="input-field">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" placeholder="Name of the company" value="<?php echo $company_name;?>" autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Phone Number</label>
                                                <input type="text" name ="phone_number" placeholder="Phone Number" value="<?php echo $phone_number;?>"autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Mobile</label>
                                                <input type="text" name ="mobile" placeholder="Mobile Number" value="<?php echo $mobile;?>" autocomplete="off">
                                            </div>

                                            <div class="input-field">
                                                <label>Fax</label>
                                                <input type="text" name="fax" placeholder="Fax" value="<?php echo $fax;?>" autocomplete="off" >
                                            </div>

                                            <div class="input-field">
                                                <label>Sub City</label>
                                                <input type="text" name="subcity" placeholder="Sub City" value="<?php echo $subcity;?>" autocomplete="off" required>
                                            </div>

                                            <div class="input-field">
                                                <label>Business Type</label>
                                                <input type="text" name="business_type" placeholder="Business Type for the company" value="<?php echo $business_type;?>" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Location</label>
                                                <input type="text" name="location" placeholder="Location of the company" value="<?php echo $location;?>" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Website</label>
                                                <input type="text" name="url" placeholder="Website / url of the company" value="<?php echo $url;?>" autocomplete="off" >
                                            </div>

                                        </div>
                                        <div class="form first form2">
                                            <div class="details personal">
                                                <span class="title">Required Information</span>
                                                
                                        <div class="fileds">



                                            <div class="input-field">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email of the company" value="<?php echo $email;?>" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Mobile2</label>
                                                <input type="text" name="mobile2" placeholder="Additional Mobile2" value="<?php echo $mobile2;?>" autocomplete="off">
                                            </div>

                                            <div class="input-field">
                                                <label>Primary Category</label>
                                                <input type="text" name="primary_category" placeholder="Primary Category" value="<?php echo $primary_category;?>" autocomplete="off"  required>
                                            </div>

                                            <div class="input-field">
                                                <label>Categories</label>
                                                <select id="category-select" name="category" onchange="changeCategory(this.value) " value="<?php echo $category;?>">
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
                                
                                <input type="submit" class="submit-button" value="Update">
                            </form>
                            
                        </div>
                    </div>
                <a  href="search.php"><button class="cancel-btn">Cancel</button></a>
                </div>
            </div>
        </div>



    </section>

    

    <script src="script.js"></script>
</body>

</html>
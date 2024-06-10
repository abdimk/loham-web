<?php
require_once "../assets/session_start.php";


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
    <link rel="stylesheet" href="../css/apimain.css">
    <link rel="stylesheet" href="../css/myselector.css">
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
            <li class="my-active">
                <a href="#">
                    <i class='bx bx-coin-stack'></i>
                    <span class="link_name">Documentaion</span>
                </a>
            </li>
<!-- 
            <li class="">
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
                <a href="#">
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
                <span class="dashbord">API Usage Documentaion</span>
            </div>

            <div class="profile-details">
                <img src="<?php echo $image;?>" alt="">
                <span class="admin_name"><?php echo ucfirst($name);?></span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <!-- home content -->
        <div class="home-content">
            <div class="hero">


                <h1>API Documentation</h1>
                <p class="description">
                Business Directory API built on top of FastAPI and Uvicorn Server uses JWT for authentication and authorization. FastAPI has native support for Uvicorn,Uvicorn is an ASGI server, which means it communicates using the Asynchronous Server Gateway Interface, a modern standard for Python asynchronous applications
                </p>

                <div class="endpoint">
                    <h2>About</h2>
                    <p class="description">
                        This endpoint retrieves the current version of the API
                    <h3>Endpoint</h3>
                    <div class="url">GET https://loham.onrender.com/v1/about</div>

                    <!-- <h3>Parameters</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>id</td>
                                <td>integer</td>
                                <td>The ID of the user to retrieve</td>
                            </tr>
                        </tbody>
                    </table> -->

                    <h3>Response</h3>
                    <div class="code">
                        <pre>
                        {
                            "Version": "0.0.1",
                            "Developer": "Abdisa (Netkas) | (0_0)",
                            "Released Year": "April 10 2024",
                            "Github": "https://github.com/abdimk/loham"
                        }
                        </pre>
                    </div>
                </div>



                <div class="endpoint">
                    <h2>Get Request Address</h2>
                    <p class="description">
                        This endpoint allows you to create a new user by providing the necessary user information in the
                        request body.
                        Ensure that all required fields are included.
                    </p>
                    <h3>Endpoint</h3>
                    <div class="url">GET https://loham.onrender.com/get_me</div>
    
                    <h3>Response</h3>
                    <div class="code">
                        <pre>
                        {
                            "client_ip": "196.191.159.177",
                            "user_agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36",
                            "method": "GET",
                            "path": "/get_me",
                            "query_params": {},
                            "cookies": {},
                            "hobo": ":)"
                        }
                        </pre>
                    </div>

                </div>

                <div class="endpoint">
                    <h2>To get Category Count</h2>
                    <p class="description">
                        You can find the latest update category count of the description
                    </p>

                    <h3>Endpoint</h3>
                    <div class="url">GET https://loham.onrender.com/get_category_count</div>

                    <h3>Response</h3>
                    <div class="code">
                        <pre>
                    [
                                {
                                    "categories": "Agriculture",
                                    "category_count": 603
                                },
                                {
                                    "categories": "Automotive",
                                    "category_count": 785
                                },
                                {
                                    "categories": "Banking",
                                    "category_count": 22
                                }                                        
                                                                             ]
                        </pre>
                    </div>

                </div>




                <div class="endpoint">
                    <h2>Get Company with an id</h2>
                    <p class="description">
                        You can get companies with specified id in the database 
                    </p>

                    <h3>Endpoint</h3>
                    <div class="url">GET https://loham.onrender.com/get/{}</div>

                    <h3>Response</h3>
                    <div class="code">
                        <pre>
                        {
                            "id": 32,
                            "company_name": "MEMORIES TOUR OPERATOR  PLC",
                            "phone_number": "5525729/6555078",
                            "mobile": "1203977",
                            "fax": "5525729",
                            "sub_city": "",
                            "business_type": "PRIVATE",
                            "location": "Addis Ababa",
                            "url": "https://www.2merkato.com/directory/1253-memories-tour-operator-plc",
                            "primary_category": "None",
                            "categories": "Commercial Agent"
                        }
                        </pre>
                    </div>

                </div>
    
                

                <div class="endpoint">
                    <h2>Search with initals in the name</h2>
                    <p class="description">
                        You can get companies with their name initals for example 'Agro', 'pharma','exporters'
                        and returns a list of ten companies with the same initals 
                    </p>

                    <h3>Endpoint</h3>
                    <div class="url">GET https://loham.onrender.com/get_with_initals/{}</div>

                    <h3>Response</h3>
                    <div class="code">
                        <pre>
                        [
                            {
                                "id": 217,
                                "company_name": "SYNGENTA AGRO SERVCIES AG",
                                "phone_number": "+251 11 5158723/5534212",
                                "mobile": "+251 91 1238683",
                                "fax": "+251 11 5158667",
                                "sub_city": "",
                                "business_type": "",
                                "location": "Addis Ababa, Ethiopia",
                                "url": "https://www.2merkato.com/directory/6089-syngenta-agro-servcies-ag",
                                "primary_category": "None",
                                "categories": "Commercial Representative"
                            }
                        ]
                        </pre>
                    </div>

                </div>
                <!-- Add more endpoints as needed -->
    
                <footer>
                    &copy; 2024 Loham . All rights reserved.
                </footer>
            </div>
            
        </div>

        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="my_chart.js"></script>
</body>

</html>
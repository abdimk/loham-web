<?php
try {
    // Connect to SQLite database
    $sqlitedb = new \PDO('sqlite:db/companies.db');
    $sqlitedb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute SQLite query
    $sql = "SELECT * FROM companies LIMIT 100";
    $stmt = $sqlitedb->prepare($sql);
    $stmt->execute();
    
    // Connect to MySQL database
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare MySQL query to insert or update data
    $sql = "INSERT INTO companies (id, company_name, phone_number, mobile, fax, sub_city, business_type, location, url, primary_category, categories, Mobile2, Email) 
            VALUES (:id, :company_name, :phone_number, :mobile, :fax, :sub_city, :business_type, :location, :url, :primary_category, :categories, :Mobile2, :Email)
            ON DUPLICATE KEY UPDATE 
            company_name = VALUES(company_name), phone_number = VALUES(phone_number), mobile = VALUES(mobile), fax = VALUES(fax), 
            sub_city = VALUES(sub_city), business_type = VALUES(business_type), location = VALUES(location), url = VALUES(url), 
            primary_category = VALUES(primary_category), categories = VALUES(categories), Mobile2 = VALUES(Mobile2), Email = VALUES(Email)";
    $stmt2 = $pdo->prepare($sql);
    
    // Fetch each row from SQLite database and execute MySQL query
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Bind parameters
        $stmt2->bindParam(':id', $row['id']);
        $stmt2->bindParam(':company_name', $row['company_name']);
        $stmt2->bindParam(':phone_number', $row['phone_number']);
        $stmt2->bindParam(':mobile', $row['mobile']);
        $stmt2->bindParam(':fax', $row['fax']);
        $stmt2->bindParam(':sub_city', $row['sub_city']);
        $stmt2->bindParam(':business_type', $row['business_type']);
        $stmt2->bindParam(':location', $row['location']);
        $stmt2->bindParam(':url', $row['url']);
        $stmt2->bindParam(':primary_category', $row['primary_category']);
        $stmt2->bindParam(':categories', $row['categories']);
        $stmt2->bindParam(':Mobile2', $row['Mobile2']);
        $stmt2->bindParam(':Email', $row['Email']);
        
        // Execute MySQL query
        $stmt2->execute();
    }
    
    echo "Data synchronized successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



// $name = $_POST['name'];
// try {
//     $sqlitedb = new \PDO('sqlite:db/companies.db');
//     $sqlitedb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     $stmt = $sqlitedb->prepare("SELECT * FROM companies WHERE id = 1");
//     //$stmt->bindValue(":name", "%" . $name . "%"); // Adding wildcard for partial matching
//     $stmt->execute();
    
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     var_dump($results);

   
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }



?>

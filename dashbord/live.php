<?php



$pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root','password');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM companies WHERE categories LIKE :name OR company_name LIKE :name");
$name = '%' . $_POST['name'] . '%';
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->execute();
$companies = $statement->fetchAll(PDO::FETCH_ASSOC);


if (count($companies) > 0) {
    foreach ($companies as $company) {
        echo "<tr>
                <td>" . htmlspecialchars(substr($company['company_name'], 0, 20)). "</td>
                <td>" . htmlspecialchars(substr($company['phone_number'], 0, 20)) . "</td>
                <td>" . htmlspecialchars(substr($company['mobile'], 0, 15)). "...</td>
				<td>" . htmlspecialchars(substr($company['location'], 0, 25)) . "...</td>
                <td>" . htmlspecialchars($company['categories']) . "</td>
                
				<td class=".htmlspecialchars('moto').">
                    <a href='update.php?id=" . htmlspecialchars($company['id']) . "' class='mybtn btn btn-md btn-warning'>Edit</a>
                    <form style='display:flex' action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . htmlspecialchars($company['id']) . "'>
                        <button type='submit' class='btn btn-md btn-danger'>Delete</button>
                    </form>
                </td>
				
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 results found</td></tr>";
}


?>
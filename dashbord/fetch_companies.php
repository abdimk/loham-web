<?php
// Establish database connection
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loham', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$category = $_GET['category'];
$statement = $pdo->prepare("SELECT * FROM companies WHERE categories = :category");
$statement->execute(['category' => $category]);
$companies = $statement->fetchAll(PDO::FETCH_ASSOC);

// Output fetched data
if (empty($companies)) {
    echo '<h2>No companies have been registered in this category.</h2>';
} else {
    foreach ($companies as $company) : ?>
        <div class="company-card">
            <div class="company-info">
                <h2 class="company-name"><?= $company['company_name'] ?></h2>
                <p class="company-location">
                    <img src="https://img.icons8.com/?size=100&id=13800&format=png&color=000000" alt="Location Icon" class="icon"> <?= $company['location'] ?>
                </p>
                <p class="company-phone">
                    <img src="https://img.icons8.com/?size=100&id=12921&format=png&color=000000" alt="Phone Icon" class="icon"> <?= $company['phone_number'] ?>
                </p>
                <p class="company-fax">
                    <img src="https://img.icons8.com/?size=100&id=19660&format=png&color=000000" alt="Fax Icon" class="icon"> <?= $company['fax'] ?>
                </p>
                <p class="company-category">
                    <img src="https://img.icons8.com/?size=100&id=12368&format=png&color=000000" alt="Category Icon" class="icon"> <?= $company['primary_category'] ?>
                </p>
                <p class="company-email">
                    <img src="https://img.icons8.com/?size=100&id=13826&format=png&color=000000" alt="Email Icon" class="icon"> Email: <a href="mailto:<?= $company['Email'] ?>"><?= $company['Email'] ?></a>
                </p>
            </div>
        </div>
    <?php endforeach;
}
?>

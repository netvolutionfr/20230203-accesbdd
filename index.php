<?php
const DB_HOST = "localhost";
const DB_DATABASE = "20230203-accesbdd";
const DB_USER = "root";
const DB_PASSWORD = "root";
const DB_CHARSET = "utf8mb4";

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Erreur : ". $e->getMessage();
}

$sql = "SELECT `code`, `name` FROM `departments` ORDER BY `name`";
$stmt = $db->prepare($sql);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['code'] . " : " . $row['name'];
        echo "<br>";
    }
}



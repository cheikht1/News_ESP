<?php
// $servername = "db"; // "localhost";
// $username = "cheikht";
// $password = "root";
// $dbname = "news";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }


try {
    $conn = new PDO('mysql:host=db;dbname=news', 'cheikht', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}






?>

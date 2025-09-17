<?php
$host = 'localhost';
$dbname = 'dbh59ag95zsnps';
$username = 'uzrprp3rmtdfr';
$password = '#[qI(M3@k1bz';
 
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
?>

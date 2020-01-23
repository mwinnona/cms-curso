<?php
/*$server ='localhost';
$username='root';
$password='Y@xicu3029$$2019';
$database='Prueba';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);

} catch (PDOException $e) {
    die('Connectetd failed: '.$e->getMessage());
    
}*/

$servername = "localhost";
$username = "root";
$password = "Y@xicu3029";
$dbname = "Proyecto1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
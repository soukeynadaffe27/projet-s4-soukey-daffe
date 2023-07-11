<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "reseau_social";
$connect = new mysqli($server, $username, $password, $db);
if ($connect->connect_error) {
    die("erreur de connexion à la base de données : " . $connect->connect_error);
}
?>

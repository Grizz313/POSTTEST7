<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "praktikum";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("Can't not connect to database " . mysqli_connect_error());
}
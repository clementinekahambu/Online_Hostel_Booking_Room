<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hostel_website');

// Establish database connection.

try
{
$dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Erreur de connexion à la base des données: " . $e->getMessage());
}



$con = mysqli_connect('localhost','root','','hostel_website');
// Check connection
if (mysqli_connect_error())
{
	echo "Echec de connexion à la base des données : " . mysqli_connect_error();
}
?>
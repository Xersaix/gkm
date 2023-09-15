<?php
include_once "../config.php";
class Database {


public static function connectDatabase()
{
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DBNAME;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    return $conn; 
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
      }
}
}
?>
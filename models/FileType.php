<?php
include_once "../helpers/Database.php";

class FileType
{
    public static function getAllType()
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `file_type`");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();

    $conn = null;
    return $result;

}
}



?>
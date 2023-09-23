<?php
include_once "../helpers/Database.php";
class Worker
{

public static function verifyEmail($email)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `worker` where email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}


public static function verifyPassLink($email,$password)
{


    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `worker` where email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;


    return password_verify($password,$result["password"]);
}

public static function getWorkerByEmail($email)
{

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `worker` where email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

}

public static function getMonthHoliday($id,$date)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT *
    FROM holiday_claim
    WHERE ID_Worker = :id
      AND DATE_FORMAT(date, '%y-%m') = :date ;
    ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;

}

public static function getWorkerExpense($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT e.id AS employer_id, e.lastname, e.firstname, e.email, e.phone, et.name AS expense_type, s.name AS status, ee.payment_date, ee.payment_ttc, ee.reason, ee.validation_date, ee.result_commentary, ee.id AS expense_id , ee.image  FROM worker e LEFT JOIN expense_note ee ON e.id = ee.ID_Worker LEFT JOIN expense_type et ON ee.id_expense_type = et.id LEFT JOIN status s ON ee.id_status = s.id WHERE e.id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;
}

public static function getWorkerPayslip($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT wf.*, ft.name AS file_type_name FROM worker_file wf JOIN file_type ft ON wf.id_File_Type = ft.id WHERE wf.ID_Worker = :id AND wf.id_File_Type = 1 ORDER BY wf.date DESC");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;
}
public static function getWorkerFile($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT wf.*, ft.name AS file_type_name FROM worker_file wf JOIN file_type ft ON wf.id_File_Type = ft.id WHERE wf.ID_Worker = :id AND wf.id_File_Type != 1 ORDER BY wf.date DESC");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;
}

public static function addHoliday($id,$fullday,$date)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO holiday_claim (date, FullDay, ID_Worker, ID_status) VALUES (:date , :fullday , :id , 2) ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':fullday', $fullday);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $conn = null;
}


}
?>
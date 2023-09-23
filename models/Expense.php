<?php
include_once "../helpers/Database.php";

class Expense
{

    public static function addExpense($date,$ttc,$reason,$type,$employer,$image)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("INSERT INTO `expense_note`(`payment_date`, `payment_ttc`, `reason`,
           `id_Expense_Type`, `ID_Worker`, `ID_status`,image)
         VALUES (:date,:ttc,:reason,:type,:employer,2,:img)");
    
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':ttc', $ttc);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':employer', $employer);
        $stmt->bindParam(':img', $image);
        $stmt->execute();
        $conn = null;
    
    }



    public static function updateExpense($date,$ttc,$reason,$type,$employer,$id,$img)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("UPDATE `expense_note` SET `payment_date` = :date, `payment_ttc` = :ttc, `reason` = :reason,
           `id_Expense_Type` = :type , `ID_Worker` = :employer, `ID_status` = 2 , `image` = :img   WHERE id = :id ");
    
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':ttc', $ttc);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':employer', $employer);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':img', $img);
        $stmt->execute();
        $conn = null;
    
    }

    public static function getNumberExpenseStats($status)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS number
        FROM expense_note
        WHERE ID_status = :status");
    
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $stmt->fetch();
        $conn = null;
        return $result;
    
    } 
    public static function getNumberExpenseStatsE($status,$id)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS number
        FROM expense_note
        WHERE ID_status = :status AND ID_Worker = :id");
    
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $stmt->fetch();
        $conn = null;
        return $result;
    
    } 



    public static function validExpense($date,$id)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("UPDATE `expense_note` SET validation_date = :date,  `ID_status` = 2 WHERE id = :id ");
    
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $conn = null;
    
    }
    public static function invalidExpense($date,$reason,$id)
    {
        $conn = Database::connectDatabase();
    
        $stmt = $conn->prepare("UPDATE `expense_note` SET validation_date = :date, result_commentary = :reason , `ID_status` = 3 WHERE id = :id ");
    
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':reason', $reason);
        $stmt->execute();
        $conn = null;
    
    }
    public static function getExpense($id)
    {

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `expense_note` where id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

    }
    public static function deleteExpense($id)
    {

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("DELETE FROM `expense_note` WHERE id=  :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;


    }
}



?>
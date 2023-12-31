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


public static function addWorker($firstname,$lastname,$password,$email)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO worker (firstname, lastname, email, password, holiday_count, id_account_type) VALUES ( :firstname , :lastname , :email , :password , 0, 3);");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
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
public static function getWorkerById($id)
{

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `worker` where id = :id");
    $stmt->bindParam(':id', $id);
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
    WHERE ID_Worker = :id AND DATE_FORMAT(date, '%y-%m') = :date ;");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;

}


public static function getMonthAbsense($id,$date)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT *
    FROM absence
    WHERE worker_id = :id
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

public static function deleteFile($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("DELETE FROM `worker_file`WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;

}
public static function deleteSocietyFile($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("DELETE FROM `society_file`WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;

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

public static function addAbsence($id,$fullday,$date)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO absence (date, FullDay, worker_id) VALUES (:date , :fullday , :id ) ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':fullday', $fullday);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $conn = null;
}

public static function getAllWorker()
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `worker`");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;
}


public static function addFile($id,$file,$date,$type)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO `worker_file`(`image`, `date`, `ID_Worker`, `id_File_Type`) VALUES ( :file , :date , :id , :type )");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':file', $file);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':type', $type);
    $stmt->execute();
    $conn = null;

}

public static function addSocietyFile($file,$date,$title)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO `society_file`(`image`, `date`,`title`) VALUES ( :file , :date , :title )");
    $stmt->bindParam(':file', $file);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
    $conn = null;

}

public static function getLastWorkerFile($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT wf.*, ft.name AS file_type_name FROM worker_file wf JOIN file_type ft ON wf.id_File_Type = ft.id WHERE wf.ID_Worker = :id AND wf.id_File_Type = 2 ORDER BY wf.date DESC LIMIT 3");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;

}

public static function getLastWorkerPayslip($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT wf.*, ft.name AS file_type_name FROM worker_file wf JOIN file_type ft ON wf.id_File_Type = ft.id WHERE wf.ID_Worker = :id AND wf.id_File_Type = 1 ORDER BY wf.date DESC LIMIT 3");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;

}

public static function getWorkerHolidayNumber($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT SUM(CASE WHEN s.name = 'Accepté' THEN 1 ELSE 0 END) AS Accepté, SUM(CASE WHEN s.name = 'En attente' THEN 1 ELSE 0 END) AS En_attente, SUM(CASE WHEN s.name = 'Refusé' THEN 1 ELSE 0 END) AS Refusé FROM status s LEFT JOIN holiday_claim hc ON s.id = hc.ID_status AND hc.ID_Worker = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

}

public static function getWorkerExpenseNumber($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT SUM(CASE WHEN s.name = 'Accepté' THEN 1 ELSE 0 END) AS Accepté, SUM(CASE WHEN s.name = 'En attente' THEN 1 ELSE 0 END) AS En_attente, SUM(CASE WHEN s.name = 'Refusé' THEN 1 ELSE 0 END) AS Refusé FROM expense_note en JOIN status s ON en.ID_status = s.id WHERE en.ID_Worker = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

}

public static function getWorkerFileNumber($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_files FROM worker_file WHERE ID_Worker = :id AND id_File_Type != 1;");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

}

public static function getWorkerHolidayCount($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT holiday_count FROM worker WHERE id = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

}


public static function setHolidayState($id,$state)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("UPDATE holiday_claim SET ID_status = :state WHERE id = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':state', $state);
    $stmt->execute();
    $conn = null;
}


public static function getHoliday($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `holiday_claim`WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;
}

public static function plusHoliday($id,$number)
{
$conn = Database::connectDatabase();
$stmt = $conn->prepare("UPDATE worker SET holiday_count = holiday_count + :number WHERE id = :id ");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':number', $number);
$stmt->execute();
$conn = null;    
}

public static function subtractHoliday($id,$number)
{
$conn = Database::connectDatabase();
$stmt = $conn->prepare("UPDATE worker SET holiday_count = holiday_count - :number WHERE id = :id ");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':number', $number);
$stmt->execute();
$conn = null;    
}


public static function setExpenseState($id,$state)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("UPDATE expense_note SET ID_status = :state WHERE id = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':state', $state);
    $stmt->execute();
    $conn = null;
}

public static function setExpenseDate($id,$date,$result)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("UPDATE expense_note SET validation_date = :date, result_commentary = :result WHERE id = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':result', $result);
    $stmt->execute();
    $conn = null;
}

public static function get4NewNotif($id)
{
$conn = Database::connectDatabase();
$stmt = $conn->prepare("SELECT * FROM notification WHERE ID_Worker = :id AND seen = 0 ORDER BY date DESC LIMIT 4");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result =  $stmt->fetchAll();
$conn = null;
return $result;

}

public static function getNotif($id)
{
$conn = Database::connectDatabase();
$stmt = $conn->prepare("SELECT * FROM notification WHERE ID_Worker = :id ORDER BY date DESC");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result =  $stmt->fetchAll();
$conn = null;
return $result;

}

public static function getAllFile()
{
$conn = Database::connectDatabase();
$stmt = $conn->prepare("SELECT * FROM society_file");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result =  $stmt->fetchAll();
$conn = null;
return $result;

}

public static function deleteNotif($id)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("DELETE FROM notification WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}

public static function newNotif($id,$date,$title,$icon,$text)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO `notification`( `date`, `title`, `text`, `icon`, `seen`, `ID_Worker`) VALUES (:date, :title , :text , :icon , 0 , :id )");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':icon', $icon);
    $stmt->bindParam(':text', $text);
    $stmt->execute();
    $conn = null;
}


public static function getallManager()
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * from worker where id_account_type != 3 ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;


}

public static function newNotifToAdmin($date,$title,$icon,$text)
{

  $manager_list = Worker::getallManager();
  for ($i=0; $i < count($manager_list) ; $i++) {

    Worker::newNotif($manager_list[$i]["id"],$date,$title,$icon,$text);

  }
}

public static function newForgot($email,$key,$date)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES (:email, :key, :expDate) ");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':key', $key);
    $stmt->bindParam(':expDate', $date);
    $stmt->execute();
    $conn = null;
}


public static function getResetKey($email,$key)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `password_reset_temp` WHERE `key`= :key and `email`= :email");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':key', $key);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;
}

public static function changePassword($mdp,$email)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("UPDATE worker SET password = :mdp WHERE email = :email ");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->execute();
    $conn = null;

}
public static function deleteKey($email)
{
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("DELETE FROM `password_reset_temp` WHERE email = :email ");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;

}

}



?>
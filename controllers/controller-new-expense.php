<?php 
session_start();
include_once "../models/ExpenseType.php";
include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["expense"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

$expense_date = "";
$expense_type = "";
$expense_reason = "";
$price_TTC = 0;
$price_HT = 0;
$file = "";
$errors = [];
$show = false;
$dateRegex = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'; 
// Get all the type and initailize the type checker. 
$types = ExpenseType::getAllType();
$types_checker = array();

$expense = Expense::getExpense($_SESSION["id"]);


// Get all the type and initailize the type checker.
foreach ($types as $row) {
    array_push($types_checker,$row["id"]);
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST["expense_date"]))
    {
        $expense_date = htmlspecialchars($_POST["expense_date"]);
        if(empty($expense_date))
        {
            $errors["date"] = "Champs obligatoire";
    
        }else if(!preg_match($dateRegex,$expense_date))
        {
            $errors["date"] = "Date invalide";
        }
    }

    if(isset($_POST["expense_type"]))
    {
        $expense_type = htmlspecialchars($_POST["expense_type"]);
        if(empty($expense_type))
        {
            $errors["type"] = "Champs obligatoire";
        } else if (!in_array($expense_type, $types_checker)) {
            $errors['type'] = 'Petit Malin ';
        }
    }

    if(isset($_POST["expense_reason"]))
    {
        $expense_reason = htmlspecialchars($_POST["expense_reason"]);
        if(empty($expense_reason))
        {
            $errors["reason"] = "Champs obligatoire";
        }
    }

    if(isset($_POST["price_ttc"]))
    {
        $price_TTC = htmlspecialchars($_POST["price_ttc"]);
        if(empty($price_TTC))
        {
            $errors["price_ttc"] = "Champs obligatoire";
        } else if (!is_numeric($price_TTC)) {
            $errors['price_ttc'] = 'Mauvais format';
        }
    }


    if(!empty($price_HT) && !empty($price_TTC))
    {

        if($price_HT >= $price_TTC)
        {
            $errors['price_ht'] = 'Prix HT >= Prix TTC'; 
        }
    }
    if(isset($_FILES["file"]))
    {


        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if($_FILES["file"]["error"] != 0)
        {

            $errors["file"] = "Veuillez selectionner un fichier valide";
        }else{

        if(!str_contains($finfo->file($_FILES["file"]["tmp_name"]), "image"))
        {
            $errors["file"] = "Le fichier n'est pas une image";

        }else if(!str_contains($_FILES["file"]["type"], "image"))
        {
            $errors["file"] = "Le fichier n'est pas une image";
        }

        if($_FILES["file"]["size"] > 41943040)
        {

        $errors["file"] = "Le fichier est plus grand que 5mo";
        }

        }
    }

if(count($errors) == 0)
{

    $file_path = '../assets/img/uploads/expense/'.$_SESSION["id"];


    // Checking whether file exists or not
    if (!file_exists($file_path)) {
    
        // Create a new file or direcotry
        mkdir($file_path, 0777, true);
    }

    $ext = "";
    switch($finfo->file($_FILES["file"]["tmp_name"]))
    {
        case 'image/bmp': $ext = '.bmp'; break;
        case 'image/gif': $ext = '.gif'; break;
        case 'image/jpeg': $ext = '.jpg'; break;
        case 'image/png': $ext = '.png'; break;
        default: $ext = false;
    }
    // 
    $data = uniqid($_SESSION["id"]);
    // Add the file in the user 
    move_uploaded_file($_FILES["file"]["tmp_name"],$file_path."/".$data."{$ext}");
    Expense::addExpense($expense_date,$price_TTC,$expense_reason,$expense_type,$_SESSION["id"],$data."{$ext}");
    Worker::newNotifToAdmin(date('Y-m-d H:i:s'),"Nouvelle dépense",
    "bi bi-receipt has-text-info","Nouvelle demande de remboursement de ".$_SESSION["firstname"]." ".$_SESSION["lastname"]);
    header('Location: controller-expense.php');
}

}
$list = Worker::getWorkerExpense($_SESSION["id"]);

include "../views/new-expense.php";
?>
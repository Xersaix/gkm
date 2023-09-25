<?php 
session_start();

include_once "../models/FileType.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["worker-list"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

$file_type = "";
$errors = [];
$date = "";
$file = "";
$dateRegex = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'; 
$types = FileType::getAllType();
$types_checker = array();

// Get all the type and initailize the type checker.
foreach ($types as $row) {
    array_push($types_checker,$row["id"]);

}


if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST["date"]))
    {
        $date = htmlspecialchars($_POST["date"]);
        if(empty($date))
        {
            $errors["date"] = "Champs obligatoire";
          
        }else if(!preg_match($dateRegex,$date))
        {
            $errors["date"] = "Date invalide";
        }
    }

    if(isset($_POST["file_type"]))
    {
        $file_type = htmlspecialchars($_POST["file_type"]);
        if(empty($file_type))
        {
            $errors["type"] = "Champs obligatoire";
        } else if (!in_array($file_type, $types_checker)) {
            $errors['type'] = 'Petit Malin ';
        }
    }

    if(isset($_FILES["file"]))
    {
   

        $finfo = new finfo(FILEINFO_MIME_TYPE);

       if($_FILES["file"]["error"] != 0)
       {

       $errors["file"] = "Veuillez selectionner un fichier valide";
       }else{

        if(str_contains($finfo->file($_FILES["file"]["tmp_name"]), "image") || str_contains($finfo->file($_FILES["file"]["tmp_name"]), "pdf"))
       {
        
       }else{
        $errors["file"] = "Le fichier n'est pas une image ou un pdf";
       }


       if($_FILES["file"]["size"] > 41943040)
       {

        $errors["file"] = "Le fichier est plus grand que 5mo";
       }

       }
    }



    if(count($errors) == 0)
{
    $file_path = "";

    if($file_type == 1)
    {
        $file_path = '../assets/img/uploads/payslip/'.$_GET["id"] ;
    }
    else
    {
        $file_path = '../assets/img/uploads/file/'.$_GET["id"] ;
    }
    
  
    // Checking whether file exists or not
    if (!file_exists($file_path)) {
      
        // Create a new file or direcotry
        mkdir($file_path, 0777, true);
    }

    $ext = "";
    switch($finfo->file($_FILES["file"]["tmp_name"]))
    {
        case 'image/bmp': $ext = '.bmp'; break;
        case 'image/cis-cod': $ext = '.cod'; break;
        case 'image/gif': $ext = '.gif'; break;
        case 'image/ief': $ext = '.ief'; break;
        case 'image/jpeg': $ext = '.jpg'; break;
        case 'image/pipeg': $ext = '.jfif'; break;
        case 'image/tiff': $ext = '.tif'; break;
        case 'image/x-cmu-raster': $ext = '.ras'; break;
        case 'image/x-cmx': $ext = '.cmx'; break;
        case 'image/x-icon': $ext = '.ico'; break;
        case 'image/x-portable-anymap': $ext = '.pnm'; break;
        case 'image/x-portable-bitmap': $ext = '.pbm'; break;
        case 'image/x-portable-graymap': $ext = '.pgm'; break;
        case 'image/x-portable-pixmap': $ext = '.ppm'; break;
        case 'image/x-rgb': $ext = '.rgb'; break;
        case 'image/x-xbitmap': $ext = '.xbm'; break;
        case 'image/x-xpixmap': $ext = '.xpm'; break;
        case 'image/x-xwindowdump': $ext = '.xwd'; break;
        case 'image/png': $ext = '.png'; break;
        case 'image/x-jps': $ext = '.jps'; break;
        case 'image/x-freehand': $ext = '.fh'; break;
        case 'application/pdf': $ext = '.pdf'; break;
        default: $ext = false;
    }


    $data = uniqid($_GET["id"]);
    move_uploaded_file($_FILES["file"]["tmp_name"],$file_path."/".$data."{$ext}");
    Worker::addFile($_GET["id"],$data."{$ext}",$date,$file_type);
}
}

include "../views/add-file.php";
?>
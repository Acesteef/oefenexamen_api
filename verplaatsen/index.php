<?php  
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();
Apikey($docent);

if (!isset($_POST["id"]) || !isset($_POST["van"]) || !isset($_POST["naar"])) fout(400, "geen params");
$van = filter_var($_POST["van"], FILTER_SANITIZE_STRING);
if (!preg_match('/^4M07[a-f]$/', $van)) fout (404, $van);
$naar = filter_var($_POST["naar"], FILTER_SANITIZE_STRING);
if (!preg_match('/^4M07[a-f]$/', $naar)) fout (404, $naar);
$id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
if ($id <= 9999) fout(400, "id");
if ($van == $naar) fout(400, $van." -> ".$naar);

$db = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBDATABASE);
if (!$db) fout(503, "geen verbinding");

$sql = "SELECT id FROM leerling WHERE id = $id AND tutorgroep ='".$van."'";
$res = mysqli_query($db, $sql);
if ($res == NULL) fout (404, "niet gevonden");
if (mysqli_num_rows($res) != 1) {
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    echo '{"verplaatsen":"geweigerd"}';  
    exit(0);
}

$sql = "UPDATE leerling SET tutorgroep =  '".$naar."' WHERE id = $id";
$res = mysqli_query($db, $sql);
if ($res == NULL) fout (503, "leerling niet verplaatst");
mysqli_close($db);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");      
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
header('Content-Type: application/json');
echo '{"verplaatsen":"akkoord"}';  

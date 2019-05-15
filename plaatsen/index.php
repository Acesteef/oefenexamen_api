<?php  
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();
Apikey($docent);

if (!isset($_POST["id"]) || !isset($_POST["voornaam"]) || !isset($_POST["achternaam"]) || !isset($_POST["naar"])) fout(400, "geen params");
$voornaam = filter_var($_POST["voornaam"], FILTER_SANITIZE_STRING);
$achternaam = filter_var($_POST["achternaam"], FILTER_SANITIZE_STRING);
$naar = filter_var($_POST["naar"], FILTER_SANITIZE_STRING);
if (!preg_match('/^4M07[a-f]$/', $naar)) fout (404, $naar);
$id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
if ($id <= 9999) fout(400, "id");


$db = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBDATABASE);
if (!$db) fout(503, "geen verbinding");

$sql = "INSERT INTO leerling VALUES ($id, '$naar', '$achternaam', '$voornaam')";
$res = mysqli_query($db, $sql);
if ($res == NULL) fout (503, "leerling niet geplaatst");
mysqli_close($db);

header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
header('Content-Type: application/json');
echo '{"verplaatsen":"akkoord"}';  

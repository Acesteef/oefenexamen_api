<?php    
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();
Apikey($docent);

if (!isset($_POST["tutorgroep"]) || !isset($_POST["id"]) || !isset($_POST["voornaam"]) || !isset($_POST["achternaam"])) fout(400, "geen params");
$tutorgroep = filter_var($_POST["tutorgroep"], FILTER_SANITIZE_STRING);
if (!preg_match('/^4M07[a-f]$/', $tutorgroep)) fout (404, $tutorgroep);
$id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
if ($id <= 9999) fout(400, "id:".$id);
$voornaam   = filter_var($_POST["voornaam"], FILTER_SANITIZE_STRING);
$achternaam = filter_var($_POST["achternaam"], FILTER_SANITIZE_STRING);

$db = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBDATABASE);
if (!$db) fout(503, "geen verbinding");

$sql = "SELECT id FROM leerling WHERE id = $id";
$res = mysqli_query($db, $sql);
if ($res == NULL) fout (503, "niet gevonden");
if (mysqli_num_rows($res) != 0) {
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    echo '{"toevoegen":"geweigerd"}';  
    exit(0);
}

$sql = "INSERT INTO leerling VALUES ($id, '".$tutorgroep."', '".$achternaam."', '".$voornaam."')";
//echo $sql; exit(0);
$res = mysqli_query($db, $sql);
if ($res == NULL) fout (503, "leerling niet opgeslagen");
mysqli_close($db);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");      
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
header('Content-Type: application/json');
echo '{"toevoegen":"akkoord"}';  

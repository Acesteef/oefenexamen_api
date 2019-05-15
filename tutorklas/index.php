<?php   
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();
Apikey($docent);

if (!isset($_POST["tutorgroep"])) fout(400, "geen params");
$tutorgroep = filter_var($_POST["tutorgroep"], FILTER_SANITIZE_STRING);
if (!preg_match('/^4M07[a-f]$/', $tutorgroep)) fout (404, $tutorgroep);

class NC {
    public $docent ;
    public $leerlingen = array();
}
$nc = new NC();

$db = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBDATABASE);
if (!$db) fout(503, "geen verbinding");
mysqli_set_charset($db,'utf8');  

$sql = "SELECT id,voornaam,achternaam FROM docent WHERE tutorgroep = '".$tutorgroep."'";
//echo $sql; exit(0);

$res = mysqli_query($db, $sql);
if ($res == NULL) fout (404, "niet gevonden");
if (mysqli_num_rows($res) != 1) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");      
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    header('Content-Type: application/json');
    echo '{"tutorgroep":"undefined"}';  
    exit(0);
}
$row = mysqli_fetch_array($res);
$nc->docent->id         = $row['id'];
$nc->docent->voornaam   = $row['voornaam'];
$nc->docent->achternaam = $row['achternaam'];

$sql = "SELECT id,voornaam,achternaam FROM leerling WHERE tutorgroep = '".$tutorgroep."'";
//echo $sql; exit(0);

$res = mysqli_query($db, $sql);
if ($res == NULL) fout (503, "niet gevonden");


while ($row = mysqli_fetch_assoc($res)) {$nc->leerlingen[] = $row; }
/*
for ($i=0; $i<count($nc->leerlingen); $i++) { 
    $nc->leerlingen[$i]["voornaam"]   = htmlentities( $nc->leerlingen[$i]["voornaam"],   ENT_NOQUOTES, 'ISO-8859-1');
    $nc->leerlingen[$i]["achternaam"] = htmlentities( $nc->leerlingen[$i]["achternaam"], ENT_NOQUOTES, 'ISO-8859-1');
}
header('Content-language: nl');
*/
//header('Content-type: text/plain; charset=ISO-8859-1');
//header('Content-type: text/plain; charset=utf-8');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo json_encode($nc);

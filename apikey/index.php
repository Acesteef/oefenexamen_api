<?php    
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();

if (!isset($_POST["wachtwoord"]))    fout(400, "wachtwoord ontbreekt");
if ($_POST["wachtwoord"] !== "test") fout(401, "wachtwoord incorrect");

header('Access-Control-Allow-Origin: *');     
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
header('content-type: application/json; charset=utf-8');
echo '{"apikey":"'.md5(md5($docent)).'"}';    

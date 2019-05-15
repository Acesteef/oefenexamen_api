<?php   
session_start();
include "../errors.inc.php";
include "../credentials.inc.php";
include "../database.inc.php";

$docent = Docent();
Apikey($docent);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");      
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
header('Content-Type: application/json');
echo '{"tutorklassen": [{"id": "4M07a"},{"id": "4M07b"},{"id": "4M07c"},{"id": "4M07d"},{"id": "4M07e"},{"id": "4M07f"}]}';  

<?php

function Apikey($pnr){
    if ($_SERVER["REQUEST_METHOD"] != "POST") fout (500, "methode");
    if (!isset($_POST)) fout (400, "parameters ontbreken");
    if (!isset($_POST["apikey"])) fout (404, "apikey ontbreekt");
    $apikey = filter_var($_POST["apikey"], FILTER_SANITIZE_STRING);
    if ($apikey != md5(md5($pnr))) fout (401, "apikey incorrect");    
}

function Docent(){
   if ($_SERVER["REQUEST_METHOD"] != "POST") fout (500, "methode");
    if (!isset($_POST)) fout (400, "parameters ontbreken");
    if (!isset($_POST["docent"])) fout (404, "docent ontbreekt");
    $pnr = filter_var($_POST["docent"], FILTER_SANITIZE_STRING);
    if (!preg_match('/^[A-Z]{4}$/', $pnr)) fout (404, $pnr);
    return $pnr;
}


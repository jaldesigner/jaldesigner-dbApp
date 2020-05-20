<?php
//include_once('./df/dfile.php');
date_default_timezone_set("Brazil/East");

$host = 'localhost';    //Nome do host
$db = 'app_refeicao';   //Nome do banco de dados
$hostUser = 'root';     //nome do usuário do banco de dados
$hostPass = '';         //Senha do banco de dados

$con = new mysqli($host, $hostUser, $hostPass, $db);
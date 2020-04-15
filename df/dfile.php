<?php

$json = file_get_contents('php://input');
$obj  = json_decode($json, true);

define('ID_APP', $obj['ID_APP']);

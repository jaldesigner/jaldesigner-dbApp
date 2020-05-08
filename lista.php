<?php

include 'dbconfig.php';

$json = file_get_contents('php://input');
$obj  = json_decode($json, true);

$ID_APP = $obj['ID_APP'];

$sql = "SELECT * FROM prato WHERE id_App = '$ID_APP'";

$result = $con->query($sql);

if($result->num_rows > 0){
    while($row[] = $result->fetch_assoc()){
        $pratos = $row;
        $json = json_encode($pratos);
    }
}

echo $json;
$con->close();

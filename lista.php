<?php

include 'dbconfig.php';

$tabela = 'prato';
$sql = "select * from $tabela";

$result = $con->query($sql);

if($result->num_rows > 0){
    while($row[] = $result->fetch_assoc()){
        $pratos = $row;
        $json = json_encode($pratos);
    }
}else{
    echo 'Não há Pratos cadastrados.';
}

echo $json;
$con->close();

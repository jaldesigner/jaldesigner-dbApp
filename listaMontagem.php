<?php
include './dbconfig.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

//$ID_APP   = 'SUQ6IDEKRW1wcmVzYTogSkQgUmVmZWnDp8O1ZXMKUmVwcmVzZW50YW50ZTogSm9uYXMgQWx2ZXMgTHVjYXM=';
$ID_APP   = $obj['ID_APP'];
//$id_prato = $obj['id_prato'];
//$nome_opcao = $obj['nome_opcao'];
$data_montagem = date('j-n-Y');

//$sql  = "SELECT * FROM prato_do_dia WHERE id_prato_dia = '$id_prato'";
//$sql1 = "SELECT * FROM opca_prato_dia WHERE id_opcao = '$id_opcao'";
$sql = "SELECT * FROM montagem_prato WHERE id_App='$ID_APP' && data_montagem = '$data_montagem' ";

$result = $con->query($sql);

if($result->num_rows > 0){
    while($row[] = $result->fetch_assoc()){
        $opcao = $row;
        $json = json_encode($opcao);
    }
}
echo $json;
$con->close();

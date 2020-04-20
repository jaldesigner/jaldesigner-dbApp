<?php
/**
 * INclusão do documento de configuração do banco de dados
 */
include './dbconfig.php';

/**
 * Criamos a variável com a entrada do json 
 * atravéz da função file_get_contents()
 */
$json = file_get_contents('php://input');

/**
 * Transformamos em objeto o json que capituramos na entrada
 * com a função json_decoder()
 */
$obj = json_decode($json, true);

/**
 * Colocamos em variáveis os objetos que decodificamos
 * e colocamos na variável $obj
 */
//$ID_APP = 'SUQ6IDEKRW1wcmVzYTogSkQgUmVmZWnDp8O1ZXMKUmVwcmVzZW50YW50ZTogSm9uYXMgQWx2ZXMgTHVjYXM=';
$ID_APP = $obj['ID_APP'];
//$data = date('d-n-Y'); //$obj['data'];

/**
 * selecionamos todas as opções que há no banco de dados
 * e colocamos na variável $sql
 */
$sql = "SELECT * FROM opcao_prato WHERE id_App = '$ID_APP'";

/**
 * Aqui faremos a query (corrida), por todo o banco
 * e pegamos todos os resultados 
 */
 $result = $con->query($sql);

 /**
  * Contaremos o resultado para saber quantos foram achados
  * e se o resultado for maior que zero
  * fazemos um loop com while e salvamos em um array tudo que for retornado
  * na função fetch_assoc() e dentro do while retornamos já colocando nesse
  * loop um json_encode() para retornamos para o App
 */
  if($result->num_rows > 0){
      while($row[] = $result->fetch_assoc()){
          $opcao = $row;
          $json = json_encode($opcao);
      }
  }

  /**
   * Aqui damos um echo
   * para ser exibido o resultado do json e
   */
  echo $json;

  $con->close(); //Fechamos a conexão

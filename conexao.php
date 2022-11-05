<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "loja";
  
$conexao = new mysqli($servidor, $usuario, $senha, $bd);
if(!$conexao){
    die ("Não foi possível conectar ao Banco!".mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");

?>
<?php

// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root"; 
$password = ""; 
$db_name = "crud";

// Estabelece a conexão com o banco de dados usando as informações acima
$connect = mysqli_connect($servername, $username, $password, $db_name);

// Define o conjunto de caracteres para utf8 para garantir a codificação correta de caracteres especiais
mysqli_set_charset($connect, "utf8");

// Verifica se houve algum erro na conexão com o banco de dados
if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}

?>

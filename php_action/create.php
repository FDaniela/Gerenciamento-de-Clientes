<?php

// Inicia a sessão para armazenar informações entre páginas
session_start();

// Requer o arquivo de conexão com o banco de dados
require_once 'db_connect.php';

// Função para limpar e proteger os dados de entrada
function clear($input) {

    global $connect;

    // Protege contra SQL Injection 
    $var = mysqli_escape_string($connect, $input);
    // Protege contra ataques XSS (Cross-Site Scripting)
    $var = htmlspecialchars($var);
    return $var;

}

// Verifica se o botão "btn-cadastrar" foi pressionado no formulário
if (isset($_POST['btn-cadastrar'])) {

    // Limpa e armazena os valores enviados pelo formulário
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    // Executa a query SQL e verifica se a inserção foi bem-sucedida ou não
    if (mysqli_query($connect, $sql)) {

        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');

    } else {

        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');

    }

}

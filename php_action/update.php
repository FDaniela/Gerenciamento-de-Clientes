<?php

// Inicia a sessão para permitir o uso de variáveis de sessão
session_start();

// Requer o arquivo de conexão com o banco de dados
require_once 'db_connect.php';

// Verifica se o formulário de edição foi enviado
if (isset($_POST['btn-editar'])) {

    // Obtém os valores do formulário e escapa-os para evitar SQL Injection
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    // Query SQL para atualizar os dados do cliente com base no ID
    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

    // Executa a query SQL e verifica se a atualização foi bem-sucedida ou não
    if (mysqli_query($connect, $sql)) {

        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');

    } else {

        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: ../index.php');

    }
}

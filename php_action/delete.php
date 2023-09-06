<?php

// Inicia a sessão para permitir o uso de variáveis de sessão
session_start();

// Requer o arquivo de conexão com o banco de dados
require_once 'db_connect.php';

// Verifica se o formulário de exclusão foi enviado (quando o botão "btn-deletar" é pressionado)
if (isset($_POST['btn-deletar'])) {

    // Obtém o ID do cliente a ser excluído do formulário
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    // Query SQL para excluir o cliente com base no ID
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    // Executa a query SQL e verifica se a exclusão foi bem-sucedida ou não
    if (mysqli_query($connect, $sql)) {

        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');

    } else {

        $_SESSION['mensagem'] = "Erro ao deletar";
        header('Location: ../index.php');
        
    }
}

<?php

// Inclui o arquivo de conexão com o banco de dados
include_once 'php_action/db_connect.php';

// Inclui o cabeçalho da página
include_once 'includes/header.php';

// Verifica se foi passado o parâmetro 'id' na URL (identificador do cliente a ser editado)
if (isset($_GET['id'])) {
    // Obtém o 'id' do cliente da URL e escapa-o para evitar SQL Injection
    $id = mysqli_escape_string($connect, $_GET['id']);

    // Query SQL para selecionar os dados do cliente com base no 'id'
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    
    // Obtém os dados do cliente e armazena-os em uma variável
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar cliente</h3>
        <form action="php_action/update.php" method="POST">
            <!-- Campo oculto para enviar o 'id' do cliente a ser atualizado -->
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
                <label for="idade">Idade</label>
            </div>
            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn light-green" >Lista de clientes</a>
        </form>
    </div>
</div>

<?php
// Inclui o rodapé da página
include_once 'includes/footer.php';
?>

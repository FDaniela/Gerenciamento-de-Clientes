<?php
    // Inicia a sessão para acessar as variáveis de sessão
    session_start();

    // Verifica se a variável de sessão 'mensagem' está definida
    if (isset($_SESSION['mensagem'])): 
?>

    <script>
    // Quando a página é carregada, exibe uma notificação toast com a mensagem da sessão
    window.onload = function () {
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    }
    </script>

<?php 

    endif;
    // Remove todas as variáveis de sessão
    session_unset();
?>

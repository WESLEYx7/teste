<?php
// auth/authentication.php
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o email e senha foram enviados
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Verificar o email e senha (substitua com a lógica do seu sistema)
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Lógica de autenticação (exemplo simples, substitua com a lógica do seu sistema)
        if ($email === 'usuario@example.com' && $password === 'senha123') {
            $nomeUsuario = "Usuário Teste";
            
            // Autenticação bem-sucedida, redirecionar para a pasta app
            $_SESSION['logged_in'] = true;
            $_SESSION['nome_usuario'] = $nomeUsuario;
            header("Location: ../app/");
            exit();
        } else {
            // Autenticação falhou, redirecionar de volta para o formulário de login com uma mensagem de erro
            header("Location: ../public/?error=1");
            exit();
        }
    }
}
?>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome_cartao']) && isset($_POST['numero_cartao']) && isset($_POST['codigo_validacao']) && isset($_POST['vencimento']) && isset($_POST['cpf'])) {
        $_SESSION['dados']['cartao'] = [
            'nome_cartao' => trim($_POST['nome_cartao']),
            'numero_cartao' => trim($_POST['numero_cartao']),
            'codigo_validacao' => trim($_POST['codigo_validacao']),
            'vencimento' => trim($_POST['vencimento']),
            'cpf' => trim($_POST['cpf'])
        ];

        header("Location: perfil.php");
        exit;
    }
}
?>


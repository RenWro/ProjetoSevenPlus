<?php
session_start();

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$confirmar_senha = trim($_POST['confirmar_senha']);

if (empty($nome) || empty($email) || empty($senha) || $senha !== $confirmar_senha) {
    echo "Erro: Todos os campos devem ser preenchidos corretamente e as senhas devem coincidir.";
    exit;
}

// Hashing the password before storing
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$_SESSION['dados'] = [
    'usuario' => [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha_hash,
        'senha_original' => $senha // Armazenar a senha original
    ]
];

header("Location: planos.php");
exit;
?>

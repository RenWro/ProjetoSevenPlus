<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $planos = [
        'Premium 4K + HDR' => 'R$ 59,90/mês',
        'Padrão 1080p' => 'R$ 44,90/mês',
        'Padrão com anúncios 1080p' => 'R$ 20,90/mês'
    ];

    if (isset($_POST['tipo_plano'])) {
        $tipo_plano = $_POST['tipo_plano'];
        $preco_plano = $planos[$tipo_plano];

        $_SESSION['dados']['plano'] = [
            'tipo_plano' => $tipo_plano,
            'preco' => $preco_plano
        ];

        header("Location: pagamento.php");
        exit;
    }

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


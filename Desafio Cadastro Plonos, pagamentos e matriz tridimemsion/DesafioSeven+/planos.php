<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $planos = [
        'Premium 4K + HDR' => 'R$ 59,90/mês',
        'Padrão 1080p' => 'R$ 44,90/mês',
        'Padrão com anúncios 1080p' => 'R$ 20,90/mês'
    ];

    $tipo_plano = $_POST['tipo_plano'];
    $preco_plano = $planos[$tipo_plano];

    $_SESSION['dados']['plano'] = [
        'tipo_plano' => $tipo_plano,
        'preco' => $preco_plano
    ];

    header("Location: pagamento.php");
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seven+ - Planos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #11111f;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            border: 1px solid #003049;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 20px 0;
        }
        .form-container {
            background-color: #ffffff;
            border: 1px solid #003049;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 20px 0;
        }

        .form-container label {
            display: block;
            margin-top: 10px;
            color: #003049;
        }

        .form-container button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background-color: #11111f;
            color: #fdf0d5;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #8d99ae;
        }

        .cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: nowrap;
        }

        .card {
            border: 1px solid #003049;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 30%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            background-color: #f1f1f1;
        }
        .card-header {
            border-radius: 10px 10px 0 0;
            color: #fff;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-body {
            padding: 10px;
            text-align: center;
        }

        .card-body p {
            margin: 5px 0;
            font-size: 12px;
            color: #888;
        }

        .card-body h3 {
            margin: 5px 0;
            font-size: 14px;
            color: #000;
        }
        img {
            max-width: 250px;
            margin-bottom: 1px;
        }
        header img {
            max-width: 250px;
            margin: 2px auto;
        }

        header {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color: #11111f;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        h1 {
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 80px;
        }
    </style>
</head>
<body>
<header>
    <img src="img/seven.png" alt="Seven+">
</header>
<div class="form-container">
    <h1>Escolha seu Plano</h1>
    <div class="cards">
        <div class="card" onclick="escolherPlano('Premium 4K + HDR', 'R$ 59,90/mês')">
            <div class="card-header">Premium 4K + HDR</div>
            <div class="card-body">
                <p>Preço/mês</p>
                <h3>R$ 59,90</h3>
                <p>Qualidade de vídeo e áudio</p>
                <h3>Excepcional</h3>
                <p>Resolução</p>
                <h3>4K (Ultra HD) + HDR</h3>
                <p>Áudio espacial (som imersivo)</p>
                <h3>Incluso</h3>
                <p>Aparelhos compatíveis</p>
                <h3>TV, computador, celular, tablet</h3>
                <p>Aparelhos para assistir ao mesmo tempo na sua residência</p>
                <h3>4</h3>
                <p>Aparelhos de download</p>
                <h3>6</h3>
                <p>Anúncios</p>
                <h3>Sem anúncios</h3>
            </div>
        </div>
        <div class="card" onclick="escolherPlano('Padrão 1080p', 'R$ 44,90/mês')">
            <div class="card-header">Padrão 1080p</div>
            <div class="card-body">
                <p>Preço/mês</p>
                <h3>R$ 44,90</h3>
                <p>Qualidade de vídeo e áudio</p>
                <h3>Boa</h3>
                <p>Resolução</p>
                <h3>1080p (Full HD)</h3>
                <p>Aparelhos compatíveis</p>
                <h3>TV, computador, celular, tablet</h3>
                <p>Aparelhos para assistir ao mesmo tempo na sua residência</p>
                <h3>2</h3>
                <p>Aparelhos de download</p>
                <h3>2</h3>
                <p>Anúncios</p>
                <h3>Sem anúncios</h3>
            </div>
        </div>
        <div class="card" onclick="escolherPlano('Padrão com anúncios 1080p', 'R$ 20,90/mês')">
            <div class="card-header">Padrão com anúncios 1080p</div>
            <div class="card-body">
                <p>Preço/mês</p>
                <h3>R$ 20,90</h3>
                <p>Qualidade de vídeo e áudio</p>
                <h3>Boa</h3>
                <p>Resolução</p>
                <h3>1080p (Full HD)</h3>
                <p>Aparelhos compatíveis</p>
                <h3>TV, computador, celular, tablet</h3>
                <p>Aparelhos para assistir ao mesmo tempo na sua residência</p>
                <h3>2</h3>
                <p>Aparelhos de download</p>
                <h3>2</h3>
                <p>Anúncios</p>
                <h3>Menos do que você pensa</h3>
            </div>
        </div>
    </div>
</div>

<script>
    function escolherPlano(plano, preco) {
        fetch('planos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'tipo_plano=' + encodeURIComponent(plano) + '&preco=' + encodeURIComponent(preco)
        })
            .then(response => response.text())
            .then(data => {
                window.location.href = 'pagamento.php';
            });
    }
</script>
</body>
</html>











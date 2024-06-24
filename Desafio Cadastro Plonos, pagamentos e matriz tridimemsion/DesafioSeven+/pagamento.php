
<?php
session_start();
if (!isset($_SESSION['dados']['plano']['tipo_plano']) || !isset($_SESSION['dados']['plano']['preco'])) {
    header("Location: planos.php");
    exit;
}
$planoEscolhido = $_SESSION['dados']['plano']['tipo_plano'];
$precoPlano = $_SESSION['dados']['plano']['preco'];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seven+ - Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #11111f;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            border: 1px solid #003049;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
            color: #003049;
        }
        .form-container input, .form-container button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #003049;
            border-radius: 5px;
        }
        .form-container button {
            margin-top: 20px;
            background-color: #003049;
            color: #fdf0d5;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #669BBC;
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
            padding: 0px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        }
        .plano-escolhido {
            font-size: 18px;
            color: #003049;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<img src="img/seven.png" alt="Seven+">
<div class="form-container">
    <div class="plano-escolhido">Plano escolhido: <?php echo $planoEscolhido . ' - ' . $precoPlano; ?></div>
    <form id="pagamento_form" method="post" action="pagamento_process.php" onsubmit="return validarForm()">
        <h2>Dados de Pagamento</h2>
        <label>Nome no Cartão</label>
        <input type="text" name="nome_cartao" required>
        <label>Número do Cartão</label>
        <input type="text" name="numero_cartao" id="numero_cartao" placeholder="0000 0000 0000 0000" maxlength="19" required>
        <label>Código de Validação</label>
        <input type="text" name="codigo_validacao" required>
        <label>Vencimento</label>
        <input type="text" name="vencimento" id="vencimento" placeholder="MM/AA" maxlength="5" required>
        <label>CPF</label>
        <input type="text" name="cpf" id="cpf" required>
        <button type="submit">Próxima Etapa</button>
    </form>
</div>


<script>
    function validarCPF(cpf) {
        var strCPF = cpf.replace(/[^\d]+/g, '');
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;

        return true;
    }

    function validarForm() {
        var cpfInput = document.getElementById("cpf");
        if (!validarCPF(cpfInput.value)) {
            alert("CPF inválido!");
            return false;
        }
        return true;
    }

    document.getElementById('vencimento').addEventListener('input', function (e) {
        var input = e.target;
        var value = input.value.replace(/\D/g, '').slice(0, 4);
        var formattedValue = value;

        if (value.length >= 3) {
            formattedValue = value.slice(0, 2) + '/' + value.slice(2, 4);
        }

        input.value = formattedValue;
    });

    document.getElementById('numero_cartao').addEventListener('input', function (e) {
        var input = e.target;
        var value = input.value.replace(/\D/g, '').slice(0, 16);
        var formattedValue = '';

        for (var i = 0; i < value.length; i++) {
            if (i > 0 && i % 4 === 0) {
                formattedValue += ' ';
            }
            formattedValue += value[i];
        }

        input.value = formattedValue;

        document.getElementById('numero_cartao').addEventListener('input', function (e) {
            var input = e.target;
            var value = input.value.replace(/\D/g, '').slice(0, 16);
            var formattedValue = '';

            for (var i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += ' ';
                }
                formattedValue += value[i];
            }

            input.value = formattedValue;
        });
        document.getElementById('numero_cartao').addEventListener('input', function (e) {
            var input = e.target;
            var value = input.value.replace(/\D/g, '').slice(0, 16);
            var formattedValue = '';

            for (var i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += ' ';
                }
                formattedValue += value[i];
            }

            input.value = formattedValue;
        });
    });
</script>
</body>
</html>
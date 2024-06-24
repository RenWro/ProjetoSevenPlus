<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seven+ - Informações Finais</title>
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
        h1{
            font-family: Arial, sans-serif;
            color: #5bc2e2;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #003049;
        }
        th {
            background-color: #1c2434;
            color: #5bc2e2;
            padding: 10px;
            text-align: center;
        }
        td {
            padding: 10px;
            text-align: center;
            color: #003049;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            max-width: 350px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<img src="img/seven.png" alt="Seven+">
<h1>Matriz Informações</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>E-mail</th>
        <th>Senha</th>
        <th>Plano Escolhido</th>
        <th>Nome no Cartão</th>
        <th>Número do Cartão</th>
        <th>PIN do Cartão</th>
        <th>Validade do Cartão</th>
        <th>Gêneros Favoritos</th>
    </tr>
    <tr>
        <td><?php session_start(); echo $_SESSION['dados']['usuario']['nome']; ?></td>
        <td><?php echo $_SESSION['dados']['cartao']['cpf']; ?></td>
        <td><?php echo $_SESSION['dados']['usuario']['email']; ?></td>
        <td><?php echo $_SESSION['dados']['usuario']['senha_original']; ?></td> <!-- Exibir a senha original -->
        <td><?php echo $_SESSION['dados']['plano']['tipo_plano']; ?></td>
        <td><?php echo $_SESSION['dados']['cartao']['nome_cartao']; ?></td>
        <td><?php echo $_SESSION['dados']['cartao']['numero_cartao']; ?></td>
        <td><?php echo $_SESSION['dados']['cartao']['codigo_validacao']; ?></td>
        <td><?php echo $_SESSION['dados']['cartao']['vencimento']; ?></td>
        <td><?php echo isset($_SESSION['dados']['perfil']['generos']) ? $_SESSION['dados']['perfil']['generos'] : 'N/A'; ?></td>
    </tr>
</table>
</body>
</html>

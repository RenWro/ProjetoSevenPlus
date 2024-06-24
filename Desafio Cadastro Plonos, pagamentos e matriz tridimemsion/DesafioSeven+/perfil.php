<?php
session_start();
if (!isset($_SESSION['dados']['usuario']) || !isset($_SESSION['dados']['plano'])) {
    header("Location: cadastro.html");
    exit;
}
$nome = $_SESSION['dados']['usuario']['nome'];
$email = $_SESSION['dados']['usuario']['email'];
$plano = $_SESSION['dados']['plano']['tipo_plano'];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seven+ - Perfil</title>
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
            border-radius: 30px;
            padding: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin-top: 0px;
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

        .toggle-switch {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
            width: 100%;
        }

        .toggle-switch span {
            flex: 1;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #003049;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        input:checked + .slider {
            background-color: #003049;
        }

        input:checked + .slider:before {
            background-color: #1e90ff;
        }

        hr {
            width: 66%;
            border: 1px solid #003049;
        }
        h2 {
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-weight: bold;
        }
        .header-line {
            width: 60%;
            border-bottom: 2px solid #003049;
            margin: 10px auto;
        }
        .section-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #003049;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <img src="img/seven.png" alt="Seven+">
</header>
<div class="form-container">
    <h1>Perfil</h1>
    <hr>
    <label>Nome: <?php session_start(); echo isset($_SESSION['dados']['usuario']['nome']) ? $_SESSION['dados']['usuario']['nome'] : ''; ?></label>
    <label>E-mail: <?php echo isset($_SESSION['dados']['usuario']['email']) ? $_SESSION['dados']['usuario']['email'] : ''; ?></label>
    <label>Plano: <?php echo isset($_SESSION['dados']['plano']['tipo_plano']) ? $_SESSION['dados']['plano']['tipo_plano'] : ''; ?></label>
    <hr>
    <h2>Gêneros Favoritos</h2>
    <hr>
    <form id="perfil" method="post" action="perfil_process.php">
        <div class="toggle-switch">
            <span>Ação</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Ação">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Comédia</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Comédia">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Drama</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Drama">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Ficção Científica</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Ficção Científica">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Terror</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Terror">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Romance</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Romance">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Animação</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Animação">
                <span class="slider"></span>
            </label>
        </div>
        <div class="toggle-switch">
            <span>Documentário</span>
            <label class="switch">
                <input type="checkbox" name="generos[]" value="Documentário">
                <span class="slider"></span>
            </label>
        </div>
        <br>
        <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>


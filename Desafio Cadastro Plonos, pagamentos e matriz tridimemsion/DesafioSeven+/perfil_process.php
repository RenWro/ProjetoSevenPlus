<?php
session_start();

if (isset($_POST['generos'])) {
    $generos = implode(", ", $_POST['generos']);
    $_SESSION['dados']['perfil']['generos'] = $generos;
} else {
    $_SESSION['dados']['perfil']['generos'] = 'N/A';
}

header("Location: matrizInfosFinal.php");
exit;
?>

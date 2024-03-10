<?php
include('./domain/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>

<body>
    Bem vindo ao Projeto Integrador do Grupo 26 , <?php echo $_SESSION['nome']; ?>

    <p>
        <a href="./domain/login.php">Sair</a>
    </p>
</body>

</html>
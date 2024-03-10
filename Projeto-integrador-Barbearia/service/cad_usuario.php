<?php

include("./config/database.php");

// if(isset($_POST['email'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Valida o formato do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Formato de e-mail inválido.";
        } else {
        //  subir para banco de dados
        $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', md5('$senha'))");
        
        header("Location: index.php");
}
        }
    }   


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
</head>

<body>
    <h1>
        Cadastro de Usuarios
    </h1>
    <form action="" method="post">
        <p>
            <label>Nome</label>
            <input type="text" name="nome">
        </p>
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input name="senha" type="password">
        </p>

        <button type="submit">Cadastrar</button>
    </form>

</body>

</html>
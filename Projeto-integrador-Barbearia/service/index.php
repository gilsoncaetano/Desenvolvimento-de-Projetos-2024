<?php  
include("./config/database.php");

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0){
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    }else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = md5('$senha') LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['idusuarios'] = $usuario['idusuarios'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }else {
            echo "Falha ao logar! Email ou senha incorretos";
            
            }
        }
    
    
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTI</title>
</head>

<body>
    <h1>Tela de Logon</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input name="email" type="text">
        </p>
        <p>
            <label>Senha</label>
            <input name="senha" type="password">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>

        <p>
        <p>Não tenho cadastro</p>
        <button type="submit"><a href="cad_usuario.php">Cadastrar</a></button>
        </p>
    </form>

</body>

</html>
<?php
include('static/config.php');

if(isset($_POST['login'])|| isset($_POST['senha'])){

    if(strlen($_POST['login']) == 0){
        echo "preencha seu login";
    }
    else if(strlen($_POST['senha']) == 0){
        echo "preencha a sua senha";
    }
    else{
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT ID, USER, SENHA, NOME FROM usuarios WHERE USER = '$login' AND SENHA = '$senha'";
        $sql_query = $con->query($sql_code) or die("Falha na execução do codigo SQL: " . $db->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }            

            $_SESSION['id'] = $usuario['ID'];
            $_SESSION['nome'] = $usuario['NOME'];
            $_SESSION['cpf'] = $usuario['USER'];
            
            header("location: principal.php");       

        } else {
            echo "Falha ao logar! Login ou Senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <p>
            <img src="impc.png" alt="image description" align="midlle"/>
        </p>
    </center>

    <center>
        <h1>Login</h1>

        <form action="" method="POST">
            <p>
                <label>Login: </label>
                <input type ="text" name="login">
            </p>

             <br>

             <p>
                <label>Senha: </label>
                <input type="password" name="senha">
            </p>

            <br>

            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>

    </center>
</body>
</html>
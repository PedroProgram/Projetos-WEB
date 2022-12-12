<?php
include("conexao.php");
session_start();
if(isset($_POST['enviar'])){
    $email = $_POST['login'];
    $password = $_POST['password'];
    $sql_code = "SELECT * FROM login WHERE email = '" . $email ."' AND senha = Password( '" . $password ."') and status = 1";

    $result = mysqli_query( $mysqli, $sql_code);

    if(mysqli_num_rows($result )>0){
        $_SESSION ['login'] = $_POST['login'];

        header('Location:' . $_GET['pagina'] . '.php');

    } else{
        echo "<script>alert('Senha Errada!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Papelaria Humanas</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            /* background-image: linear-gradient(45deg, rgb(0, 153, 255), rgb(255, 255, 25)); */
            background-color: #1D809F;
        }
        div{
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
            background-color: rgba(84, 83, 83, 0.9);
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
    <form method="POST">
        <h1>Login</h1>
        <input type="text" name="login" placeholder="Login">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <button name="enviar">Enviar</button>
    </form>
    </div>
</body>
</html>

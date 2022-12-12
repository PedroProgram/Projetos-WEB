<?php
//$_SESSION['login'] = $_POST['username'];
session_start();
if(strlen($_SESSION['login']) == 0){
    header('location:login.php');
}
include("conexao.php");

if (isset($_POST['enviar'])) {
   
    $nome_marca = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $observacao = mysqli_real_escape_string($mysqli, $_POST['observacao']);



    $query = mysqli_query($mysqli,'INSERT INTO marca (nome_marca, status, data_cadastro, observacao) VALUES ("' . $nome_marca. '",1,now(),"' . $observacao. '")'); 
    if($query){
       echo " Marca cadastrada";
    }  
    else{
       echo  "Algo deu errado, tente novamente";
       echo $query;
    }  
 }           
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Papelaria Humanas</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

    <div id="principal">   <!-- INICIO DA DIV PRINCIAL -->
        
        <div id="conteudo">  <!-- INICIO DA DIV CONTEUDO -->
            <h1 class="titulop">Cadastro de Marca</h1>

            <div id="form" class="esquerda"> <!--INICIO DA DIV FORM-->
                
                <form method="post">  <!--INÍCIO DO FORMULÁRIO-->

                    <fieldset class="dados">  <!--INICIO DO FIELDSET DADOS PESSOAIS-->
                        <legend>Marca</legend>

                        <label for="nome" class="rotulo">Nome</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite o nome da marca" class="box">
                        <br><br>
                        <label for="ob" class="rotulo">Observação</label>
                        <input type="text" id="ob" name="observacao" required placeholder="Digite uma observação" class="box">   
                    </fieldset>
                    <button type="submit" name="enviar">Enviar</button>
                </form>  <!--FIM DO FORMULÁRIO-->
            </div>  <!--FIM DA DIV FORM-->

           
            <div class="clearfix"></div>

        </div>  <!-- FIM DA DIV CONTEUDO -->
        

    </div>  <!-- FIM DA DIV PRINCIPAL -->
    
</body>
</html>
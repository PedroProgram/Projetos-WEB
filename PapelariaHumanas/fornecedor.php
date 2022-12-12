<?php
//$_SESSION['login'] = $_POST['login'];
session_start();
if(strlen($_SESSION['login']) == 0){
    header('location:login.php');
}

include("conexao.php");

if (isset($_POST['enviar'])) {
   
    $nome_fornecedor = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $cep = mysqli_real_escape_string($mysqli, $_POST['cep']);
    $rua = mysqli_real_escape_string($mysqli, $_POST['rua']);
    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
    $cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);


    $query = mysqli_query($mysqli,'insert into fornecedor (nome, telefone, cep, rua, bairro, cidade, cnpj, data_cadastro_fornecedor, status_fornecedor) values("' . $nome_fornecedor. '","' . $telefone. '","' . $cep. '","' . $rua. '","' . $bairro. '","' . $cidade. '","' . $cnpj. '",now(),1)'); 
    if($query){
       echo " Fornecedor cadastrado";
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
            <h1 class="titulop">Cadastro de Fornecedor</h1>

            <div id="form" class="esquerda"> <!--INICIO DA DIV FORM-->
                
                <form method="post">  <!--INÍCIO DO FORMULÁRIO-->

                    <fieldset class="dados">  <!--INICIO DO FIELDSET DADOS PESSOAIS-->
                        <legend>Produto</legend>

                        <label for="nome" class="rotulo">Nome</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite um nome existente" class="box">
                        <br><br>
                        <label for="cnpj" class="rotulo">CNPJ</label>
                        <input type="number" id="cnpj" name="cnpj" required placeholder="Digite um CNPJ válido" class="box">
                        <br><br>
                        <label for="telefone" class="rotulo">Telefone</label>
                        <input type="number" id="telefone" name="telefone" required placeholder="Digite um telefone" class="box">
                        <br><br>
                        
                    </fieldset>
                        <fieldset class="endereco">
                            <legend>Endereço</legend>
                            <label for="cep" class="rotulo">CEP</label>
                            <input type="number" id="cep" name="cep" required placeholder="Digite um CEP válido" class="box">
                            <br><br>
                            <label for="rua" class="rotulo">Rua</label>
                            <input type="text" id="rua" name="rua" required placeholder="Digite seu endereço" class="box">
                            <br><br>
                            <label for="numero" class="rotulo">Número</label>
                            <input type="number" id="numero" name="numero" required placeholder="Digite o numero de sua residência" class="box">
                            <br><br>
                            <label for="bairro" class="rotulo">Bairro</label>
                            <input type="text" id="bairro" name="bairro" required placeholder="Digite seu bairro" class="box">
                            <br><br>
                            <label for="cidade" class="rotulo">Cidade</label>
                            <input type="text" id="cidade" name="cidade" required placeholder="Digite sua cidade" class="box">
                            <br><br>

                        </fieldset>
                    
                        <button type="submit" name="enviar">Enviar</button>
                </form>  <!--FIM DO FORMULÁRIO-->
               
            </div>  <!--FIM DA DIV FORM-->

            
            <div class="clearfix"></div>

        </div>  <!-- FIM DA DIV CONTEUDO -->
        

    </div>  <!-- FIM DA DIV PRINCIPAL -->
    
</body>
</html>
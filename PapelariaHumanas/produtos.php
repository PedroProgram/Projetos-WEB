<?php
//$_SESSION['login'] = $_POST['username'];
session_start();
if(strlen($_SESSION['login']) == 0){
    header('location:login.php');
}
include("conexao.php");


if (isset($_POST['enviar'])) {
   
    $nome_produto = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $quantidade = mysqli_real_escape_string($mysqli, $_POST['quantidade']);
    $preco_produto = mysqli_real_escape_string($mysqli, $_POST['preco']);
    $codigo_categoria = mysqli_real_escape_string($mysqli, $_POST['categoria']);
    $codigo_marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
    $codigo_fornecedor = mysqli_real_escape_string($mysqli, $_POST['fornecedor']);



    $query = mysqli_query($mysqli,'insert into produto (nome, quantidade, preco_produto, data_cadastro_produto, status, codigo_categoria, codigo_marca, codigo_fornecedor) values("' . $nome_produto. '","' . $quantidade. '","' . $preco_produto. '",now(),1,"' . $codigo_categoria. '","' . $codigo_marca. '","' . $codigo_fornecedor. '")'); 
    if($query){
       echo " Produto cadastrado";
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
            <h1 class="titulop">Cadastro de Produtos</h1>

            <div id="form" class="esquerda"> <!--INICIO DA DIV FORM-->
                
                <form method="post">  <!--INÍCIO DO FORMULÁRIO-->

                    <fieldset class="dados">  <!--INICIO DO FIELDSET DADOS PESSOAIS-->
                        <legend>Produto</legend>

                        <label for="nome" class="rotulo">Nome</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite um nome existente" class="box">
                        <br><br>
                        <label for="quantidade" class="rotulo">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" required placeholder="Digite uma quantidade" class="box">
                        <br><br>
                        <label for="preco" class="rotulo">Preço</label>
                        <input type="number" id="preco" name="preco" required placeholder="Digite um valor" class="box">
                        <br><br>
                        <legend>Categoria</legend>
                        <select name="categoria" id="categoria" required> Categoria
                                        <option value="">Selecione uma categroria </option>
                                        <?php
                                            //opções de cargo
                                            $query=mysqli_query($mysqli,"select codigo_categoria,nome from categoria where status = 1");
                                            while($result=mysqli_fetch_array($query))
                                            {    
                                            ?>
                                        <option value="<?php echo $result['codigo_categoria'];?>"><?php echo $result['nome'];?></option>
                                        <?php } ?>
                        </select>
                                    <br><br>
                                    <legend>Marca</legend>
                        <select name="marca" class="box">
                                        <option value="">Selecione uma marca </option>
                                            <?php
                                                 //opções de cargo
                                                $query=mysqli_query($mysqli,"select codigo_marca,nome_marca from marca where status = 1");
                                                 while($result=mysqli_fetch_array($query))
                                                {    
                                             ?>
                                       <option value="<?php echo $result['codigo_marca'];?>"><?php echo $result['nome_marca'];?></option>
                                       <?php } ?>
                        </select>
                                    <br><br>
                                    <legend>Fornecedor</legend>
                         <select name="fornecedor" class="box">
                                    <option value="">Selecione um fornecedor </option>
                                            <?php
                                                 //opções de cargo
                                                $query=mysqli_query($mysqli,"select codigo_fornecedor,nome from fornecedor where status_fornecedor = 1");
                                                 while($result=mysqli_fetch_array($query))
                                                {    
                                             ?>
                                       <option value="<?php echo $result['codigo_fornecedor'];?>"><?php echo $result['nome'];?></option>
                                       <?php } ?>
                            </select>

                            <button type="submit" name="enviar">Enviar</button>
                    

                </form>  <!--FIM DO FORMULÁRIO-->
            </div>  <!--FIM DA DIV FORM-->

          
            <div class="clearfix"></div>

        </div>  <!-- FIM DA DIV CONTEUDO -->
        

    </div>  <!-- FIM DA DIV PRINCIPAL -->
    
    
</body>
</html>
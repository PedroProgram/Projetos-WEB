<?php
//$_SESSION['login'] = $_POST['username'];
session_start();
if(strlen($_SESSION['login']) == 0){
    header('location:login.php');
}

include("conexao.php");

if (isset($_POST['enviar'])) {
   
    $nome_fun = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $rg = mysqli_real_escape_string($mysqli, $_POST['rg']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $data_nascimento_fun = mysqli_real_escape_string($mysqli, $_POST['datanasc']);
    $sexo_fun = mysqli_real_escape_string($mysqli, $_POST['sexo']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $rua = mysqli_real_escape_string($mysqli, $_POST['rua']);
    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
    $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
    $cep = mysqli_real_escape_string($mysqli, $_POST['cep']);
    $complemento = mysqli_real_escape_string($mysqli, $_POST['complemento']);
    $numero = mysqli_real_escape_string($mysqli, $_POST['numero']);
    $cargo = mysqli_real_escape_string($mysqli, $_POST['cargo']);

    $query = mysqli_query($mysqli,'insert into funcionario(nome, data_nascimento, cpf, rg, telefone, sexo, email, rua, bairro, cidade, estado, cep, complemento, numero, data_cadastro_fun, status_funcionario, codigo_cargo) values("' . $nome_fun. '","' . $data_nascimento_fun. '","' . $cpf. '","' . $rg. '","' . $telefone. '","' . $sexo_fun. '","' . $email. '","' . $rua. '","' . $bairro. '","' . $cidade. '","' . $estado. '","' . $cep. '","' . $complemento. '","' . $numero. '",now(), 1, "' . $cargo. '")'); 

    if($query){
       echo " Funcionario cadastrado";
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
            <h1 class="titulop">Cadastro de Funcionários</h1>

            <div id="form" class="esquerda"> <!--INICIO DA DIV FORM-->
                
                <form method="post">  <!--INÍCIO DO FORMULÁRIO-->

                    <fieldset class="dados">  <!--INICIO DO FIELDSET DADOS PESSOAIS-->
                        <legend>Dados Pessoais</legend>

                        <label for="nome" class="rotulo">Nome</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite um nome completo" class="box">
                        <br><br>
                        <label for="datanasc" class="rotulo">Data de Nascimento</label>
                        <input type="date" id="datanasc" name="datanasc" required placeholder="Digite uma data válida" class="box">
                        <br><br>
                        <label for="email" class="rotulo">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Digite um email válido" class="box">
                        <br><br>
                        <label for="cpf" class="rotulo">CPF</label>
                        <input type="number" id="cpf" name="cpf" size="14" maxlength="14" required placeholder="Digite seu cpf" class="box">
                        <br><br>
                        <label for="rg" class="rotulo">RG</label>
                        <input type="text" id="rg" name="rg" size="12" maxlength="12" required placeholder="Digite seu RG" class="box">
                        <br><br>
                        <label for="telefone" class="rotulo">Telefone</label>
                        <input type="number" id="telefone" name="telefone" data-mask="(00)-0000-0000" size="14" maxlength="14" required placeholder="Digite seu telefone" class="box">
                        <br><br>
                        <label for="cargo">Cargo</label>
                        <select name="cargo" id="cargo" required> Cargo
                                       <option value="">Selecione um cargo </option>
                                       <?php
                                          //opções de cargo
                                          $query=mysqli_query($mysqli,"select codigo_cargo,nome from cargo where status = 1");
                                          while($result=mysqli_fetch_array($query))
                                          {    
                                          ?>
                                       <option value="<?php echo $result['codigo_cargo'];?>"><?php echo $result['nome'];?></option>
                                       <?php } ?>
                                    </select>
                        <br><br>
                        <p>Sexo: </p>
                        <label for="sexo">
                        <input type="radio" name="sexo" id="sexof" value="feminino" checked>Feminino
                        <label for="sexo">
                        <input type="radio" name="sexo" id="sexom" value="masculino">Masculino
                        </label>
                        <label for="sexo">
                        <input type="radio" name="sexo" id="sexoo" value="outro">Outro
                        </label>
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
                        <label for="complemento" class="rotulo">Complemento</label>
                        <input type="text" id="complemento" name="complemento" placeholder="Digite se houver complemento." class="box">
                        <br><br>
                        <label for="cidade" class="rotulo">Cidade</label>
                        <input type="text" id="cidade" name="cidade" required placeholder="Digite sua cidade" class="box">
                        <br><br>
                        <label for="estado">Estado: </label>
                            <select name="estado" class="box">
                                <option>Selecione...</option>
                                <option value="estado">RJ</option>
                                <option value="estado">MG</option>
                                <option value="estado">GO</option>
                                <option value="estado">MT</option>
                                <option value="estado">MA</option>
                                <option value="estado">AC</option>
                                <option value="estado">AL</option>
                                <option value="estado">AP</option>
                                <option value="estado">AM</option>
                                <option value="estado">BA</option>
                                <option value="estado">CE</option>
                                <option value="estado">DF</option>
                                <option value="estado">ES</option>
                                <option value="estado">MS</option>
                                <option value="estado">PA</option>
                                <option value="estado">PB</option>
                                <option value="estado">PE</option>
                                <option value="estado">PI</option>
                                <option value="estado">RR</option>
                                <option value="estado">RO</option>
                                <option value="estado">RS</option>
                                <option value="estado">SC</option>
                                <option value="estado">SP</option>
                                <option value="estado">SE</option>
                                <option value="estado">TO</option>
                            </select>

                    </fieldset>
                    <button type="submit" name="enviar">Enviar</button>
                    

                </form>  <!--FIM DO FORMULÁRIO-->
            </div>  <!--FIM DA DIV FORM-->

       

            <div class="clearfix"></div>

        </div>  <!-- FIM DA DIV CONTEUDO -->
        

    </div>  <!-- FIM DA DIV PRINCIPAL -->
    
</body>
</html>
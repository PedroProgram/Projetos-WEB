<?php 
    //error_reporting(0);
   // mysqli_report(MYSQLI_REPORT_OFF);
 /// $conexao = mysqli_connect("localhost", "root", "", "humanas");
  //if(mysqli_connect_errno()){
   // echo "Conexão com o MySQL falhou: " . mysqli_connect_error();
  //}
    $hostname = "localhost";
    $usuario = "root";
    $banco = "humanas";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $banco);
    if($mysqli -> connect_errno){
      echo "Falha ao conectar: (" . $mysqli->mysqli_connect_errno . ") " . $mysqli->mysqli_connect_errno;
    }


  ?>
<html>
<head>
    <title> Gravação de Dados Aluno </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
    $host = "localhost"; // Local da base de dados MySQL
    $user = "root"; // Login do MySQL
    $pass = "";// Senha para conectar com o MySQL
    $db = "sistema_extensao"; // Nome da Database

    // Recepção dos dados provindos do Formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST['senha']);
    $endereco = $_POST["endereco"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $nasc = $_POST["nasc"];
    $renda = $_POST["renda"];
    $sexo = $_POST["sexo"];
    $corpele = $_POST["corpele"];
    $deficiente = $_POST["deficiente"];
    $cid = $_POST["cid"];

    echo "Estabelecendo a conexão com o MySQL...";
    echo "<br>";

    $con = mysqli_connect($host,$user,$pass,$db) or die(mysqli_connect_error());

     $query_dados_pessoais = "CREATE TABLE IF NOT EXISTS aluno(
          prontuario int AUTO_INCREMENT PRIMARY KEY,
          nome varchar(100) NOT NULL,
          endereco varchar(100) NOT NULL,
          corpele varchar(100) NOT NULL,
          sexo varchar(50) NOT NULL,
          rg decimal(65) NOT NULL,
          cpf bigint NOT NULL,
          renda varchar(100) NOT NULL,
          nasc date NOT NULL,
          deficiente varchar(20) NOT NULL,
          cid varchar(100)
        )CHARACTER SET utf8 COLLATE utf8_general_ci";
    mysqli_query($con,$query_dados_pessoais) or die(mysqli_error($con));

    $query_credenciais = "CREATE TABLE IF NOT EXISTS login(
              prontuario int NOT NULL PRIMARY KEY,
              email varchar(100) NOT NULL,
              senha varchar(100) NOT NULL
            )CHARACTER SET utf8 COLLATE utf8_general_ci";
    mysqli_query($con,$query_credenciais) or die(mysqli_error($con));

    if (!isset($cid)) {
        $query_dados_pessoais = "INSERT INTO aluno (nome, endereco, corpele, sexo, rg, cpf, renda, nasc, deficiente, cid)
        VALUES ('$nome', '$endereco', '$corpele', '$sexo', '$rg', '$cpf', '$renda', '$nasc', '$deficiente', 'Não possui.');";
    } else {
        $query_dados_pessoais = "INSERT INTO aluno (nome, endereco, corpele, sexo, rg, cpf, renda, nasc, deficiente, cid)
        VALUES ('$nome', '$endereco', '$corpele', '$sexo', '$rg', '$cpf', '$renda', '$nasc', '$deficiente', '$cid');";
    }

    mysqli_query($con,$query_dados_pessoais) or die(mysqli_error($con));

    $prontuario = mysqli_insert_id($con);
    $query_credenciais = "INSERT INTO login (prontuario, email, senha) VALUES ('$prontuario', '$email', '$senha');";

    mysqli_query($con,$query_credenciais) or die (mysqli_error($con));

    echo"<script language='javascript' type='text/javascript'>alert('Cadastro feito com sucesso!');window.location.href='../../index.html';</script>";

    mysqli_close($con);// Fecha
?>
</body>
</html>

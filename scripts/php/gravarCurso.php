<html>
<head>
    <title> Gravação de Dados Curso </title>
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
    $descricao = $_POST["descricao"];

    echo "Estabelecendo a conexão com o MySQL...";
    echo "<br>";

    $con = mysqli_connect($host,$user,$pass,$db) or die(mysqli_connect_error());

    $query_dados_curso = "CREATE TABLE IF NOT EXISTS curso(
              cod int NOT NULL PRIMARY KEY AUTO_INCREMENT,
              nome varchar(100) NOT NULL,
              descricao varchar(100) NOT NULL
            )CHARACTER SET utf8 COLLATE utf8_general_ci";

    mysqli_query($con,$query_dados_curso) or die (mysqli_error($con));

        $query_dados_curso = "INSERT INTO curso (nome, descricao)
        VALUES ('$nome', '$descricao');";

    mysqli_query($con,$query_dados_curso) or die (mysqli_error($con));

   echo"<script language='javascript' type='text/javascript'>alert('Curso cadastrado com sucesso!');window.location.href='../../cadastroCurso.html';</script>";

    mysqli_close($con);// Fecha
?>
</body>
</html>
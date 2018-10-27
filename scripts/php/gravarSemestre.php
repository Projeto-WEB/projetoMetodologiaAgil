<html>
<head>
    <title> Gravação de Dados Semestre </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
    $host = "localhost"; // Local da base de dados MySQL
    $user = "root"; // Login do MySQL
    $pass = "";// Senha para conectar com o MySQL
    $db = "sistema_extensao"; // Nome da Database

    // Recepção dos dados provindos do Formulário
    $ano = $_POST["ano"];
    $semestre = $_POST["semestre"];
    
    echo "Estabelecendo a conexão com o MySQL...";
    echo "<br>";

    $con = mysqli_connect($host,$user,$pass,$db) or die(mysqli_connect_error());

   $query_dados_semestre = "CREATE TABLE IF NOT EXISTS semestre(
              cod int NOT NULL PRIMARY KEY AUTO_INCREMENT,
              ano date NOT NULL,
              semestre int NOT NULL
            )CHARACTER SET utf8 COLLATE utf8_general_ci";

    mysqli_query($con,$query_dados_semestre) or die (mysqli_error($con));

        $query_dados_semestre = "INSERT INTO curso (ano, semestre)
        VALUES ('$ano', '$semestre');";
    
    mysqli_query($con,$query_dados_semestre) or die (mysqli_error($con));

    echo"<script language='javascript' type='text/javascript'>alert('Semestre cadastrado com sucesso!');window.location.href='../../cadastroSemestre.html';</script>";

    mysqli_close($con);// Fecha
?>
</body>
</html>
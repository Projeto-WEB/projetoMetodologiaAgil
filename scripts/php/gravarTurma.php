<html>
<head>
    <title> Gravação de Dados Semestre </title>
    <meta charset="utf-8">
</head>
<body>
<?php
    $host = "localhost"; // Local da base de dados MySQL
    $user = "root"; // Login do MySQL
    $pass = "";// Senha para conectar com o MySQL
    $db = "sistema_extensao"; // Nome da Database

    // Recepção dos dados provindos do Formulário
    $curso = $_POST["curso"];
    $professor = $_POST["professor"];
    $semestre = $_POST["semestre"];
    $numero_vagas = $_POST["numero_vagas"];
    $numero_cotas = $_POST["numero|_cotas"];
    
    echo "Estabelecendo a conexão com o MySQL...";
    echo "<br>";

    $con = mysqli_connect($host,$user,$pass,$db) or die(mysqli_connect_error());

    $query_dados_turma = "CREATE TABLE IF NOT EXISTS turma(
              cod int NOT NULL PRIMARY KEY AUTO_INCREMENT,
              curso varchar(100) NOT NULL,
              professor varchar(100) NOT NULL,
              semestre int(10) NOT NULL,
              numero_vagas int(10) NOT NULL,
              numero_cotas int(10) NOT NULL
            )CHARACTER SET utf8 COLLATE utf8_general_ci";
    mysqli_query($con,$query_dados_turma) or die (mysqli_error($con));

    
        $query_dados_turma = "INSERT INTO turma (curso, professor, semestre, numero_vagas, numero_cotas)
        VALUES ('$curso',  '$professor', '$semestre', '$numero_vagas, '$numero_cotas);";
    

    mysqli_query($con,$query_dados_turma) or die (mysqli_error($con));

    echo"<script language='javascript' type='text/javascript'>alert('Turma cadastrada com sucesso!');window.location.href='../../teste.html';</script>";

    mysqli_close($con);// Fecha
?>
</body>
</html>
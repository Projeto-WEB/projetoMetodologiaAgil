<?php

    // session_start inicia a sessão
    session_start();

    //Variáveis necessárias para login no sistema
    $email = $_POST["email"];
    $senha = md5($_POST['senha']);
    $entrar = $_POST["entrar"];

    //Parâmetros de conexão
    $servername = "localhost"; // Local da base de dados MySQL
    $username = "root"; // Login do MySQL
    $password = "";// Senha para conectar com o MySQL
    $dbname = "sistema_extensao"; // Nome da Database

    //Conexão com o banco dados
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Checar a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    if (isset($entrar)) {
        $verifica = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica) <= 0){
            header("Location:../../index.html");
            die();
        } else {
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            header("Location:dashboard.php");
        }
    }
?>

<?php
    if (isset($_POST["logout"])) {
        //session_start(); //iniciamos a sessão que foi aberta
        session_destroy(); //destruimos a sessão ;)
        session_unset(); //limpamos as variaveis globais das sessões
        header("location:../../index.html");
        exit();
    }
?>

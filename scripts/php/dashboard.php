<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../../styles/w3school.css">
        <link rel="stylesheet" type="text/css" href="../../styles/dashboard.css">
        <script src="../../scripts/javascript/dashboard.js"></script>
        <title>Dashboard</title>
    </head>
    <body>
        <div class="corpo_total">
            <div class="mensagem">
                <div class="w3-container w3-teal"></div>
                <?php
                    session_start();
                    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) {
                        unset($_SESSION['email']);
                        unset($_SESSION['senha']);
                        header('location:../../index.html');
                }
                    $logado = $_SESSION['email'];
                ?>
                <div>
                    <?php
                        echo" Bem-vindo $logado";
                    ?>
                </div>
                <div class="formulario">
                    <form action="logout.php" accept-charset="utf-8" method="POST">
                        <div class="botao">
                            <p><input class="w3-btn w3-teal " type="submit" name="logout" value="Logout"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

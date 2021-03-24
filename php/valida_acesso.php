<!-- Codigo para validação de acesso as paginas protegidas -->
<?php
/* autenticação de acesso */
    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: ../index.php?login=erro2');
    }
?>
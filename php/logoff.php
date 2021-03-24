<?php
    /* Fazer logoff */
    //destruir sessão e voltar a página inicial
    session_start();
    session_destroy();
    header('Location: ../index.php')
?>
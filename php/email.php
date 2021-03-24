<?php
require_once "valida_acesso.php";
session_start();
$nome = $_SESSION['contatos'];

$num = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/extra.css">
    <link rel="SHORTCUT ICON" href="../image/iconeSite.png">
    <script rel="text/javascript" href="../lib/script.js"></script>

    <style>
        body{
            background-color: whitesmoke;
        }
    </style>

</head>




<body>
    <nav class="navbar navbar-white bg-white">
        <a class="navbar-brand">
            <img src="../image/iconeSite.png" alt="Logo do Site" width="50" class="d-inline-block align-top">
            <?= $_SESSION['nome'] ?>
        </a>

        <div class="button" id="button-7">
            <div id="dub-arrow"><img src="https://image.flaticon.com/icons/svg/25/25419.svg" onclick="location.href = 'logoff.php';"></div>
            <a href="#">Sair</a>
        </div>
    </nav>

    <div class="container">
        <div class="py-3 text-center">
            <img src="./imagem/wing_mail.png" alt="" width="100" class="d-block mx-auto mb-2">
            <h2>Email</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="sendEmail.php?para=<?= $_GET['para'] ?>" method="post">
                    <div class="form-group">
                        <label for="para">Para</label>
                        <H3><?= $_GET['para'] ?></H3>
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto da mensagem">
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    <a href="home.php" class="btn btn-primary btn-lg ">Voltar</a>
                    
                </form>
            </div>
        </div>
    </div>

</body>




</html>
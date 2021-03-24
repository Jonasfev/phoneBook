<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/extra.css">
    <link rel="SHORTCUT ICON" href="image/iconeSite.png">


</head>


<body style="min-width: 100%; background-color: #f8f9fa; ">
    <nav class="p-3 mb-2 bg-light text-dark">
        
    </nav>
    <div class="fundo">
        <div class="container">
            <div class="row">
                <div class="card-login">
                    <div class="card">
                    <img src="image/iconeSite.png" alt="Logo do Site" width="50" class="d-inline-block align-center" 
        style="margin-left:43%;">
        

                        <div class="card-header" style="text-align: center;">
                            LOGIN
                        </div>
                        <div class="card-body">
                            <form action="php/valida_login.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="usuario" class="form-control" placeholder="Usuário">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                                </div>

                                <? if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                                <div class="text-danger" style="text-align: center;">
                                    Usuário ou senha inválido(s)
                                </div>
                                <? } ?>

                                <? if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                                <div class="text-danger" style="text-align: center;">
                                    Por favor, faça login antes de acessar as paginas protegidas!
                                </div>
                                <? } ?>

                                <button type="submit" class="btn btn-lg btn-primary btn-block" style="margin: 10px 0;">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="test" style="padding-top: 1px; ">
        <p style="text-align: center">Todos os Direitos Reservados © 2020</p>
        <p style="text-align: center">Andre Jesus - Danilo Fontes - Jonas Félix </p>
    </footer>
</body>

</html>
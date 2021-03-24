<?php
require_once "valida_acesso.php";
require_once "searchContact.php";
require_once "contato.php";
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
</head>


<body>
    <nav class="navbar navbar-white bg-white">
        <a class="navbar-brand">
            <img src="../image/iconeSite.png" alt="Logo do Site" width="50" class="d-inline-block align-top">
            <?= $_SESSION['nome'] ?>
        </a>
        <div class="button" id="button-7" style="margin-left: 50%;">
            <div id="dub-arrow" onclick="document.getElementById('pop1').style.display='block';"><img src="https://image.flaticon.com/icons/svg/25/25304.svg" alt=""></div>
            <a href="#">Adicionar contato</a>
        </div>
        <div class="button" id="button-7">
            <form action="homeSearch.php?">
                <input id="dub-arrow" type="text" name="nome" id="pesquisar">
                <a href="#">Pesquisar contato</a>
                <button type="submit" id="myBtn"></button>
            </form>
        </div>

        <div class="button" id="button-7">
            <div id="dub-arrow"><img src="https://image.flaticon.com/icons/svg/25/25419.svg" onclick="location.href = 'logoff.php';"></div>
            <a href="#">Sair</a>
        </div>
    </nav>

    <!-- CONTATOS -->
    <? if(isset($_GET['inclusao']) && $_GET['inclusao']== 1){?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Email enviado com sucesso!!!</h5>
        </div>
        <? } ?>
    <div class="fundo">
        <?foreach($nome as $nomes){?>
        <div id="teste<?= $nomes->exib ?>" style="position: absolute;margin-left: 50%; display:none; background-color: white;padding: 10px; margin-top:10px; border-radius:5px;">
            <div id="descContact" class="card" style="width: 18rem; ">
                <a href="#" onclick="document.getElementById('teste<?= $nomes->exib ?>').style.display='none';">[X]</a>
                <br>
                <img class="card-img-top" src="../image/icon.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $nomes->nome, " ", $nomes->sobrenome  ?></h5>
                    <p class="card-text"><?= $nomes->endereco, " - ", $nomes->bairro, " - ", $nomes->cidade, " - ", $nomes->estado, " - ", $nomes->pais  ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $nomes->telefoneFixo ?></li>
                    <li class="list-group-item"><?= $nomes->telefoneMovel ?></li>
                    <li class="list-group-item"><?= $nomes->email ?></li>
                </ul>
                <div class="card-body">
                    <a href="email.php?para=<?= $nomes->email ?>" class="card-link">Enviar E-mail</a>
                    <a href="#" class="card-link" onclick="document.getElementById('edit<?= $nomes->exib ?>').style.display='block'; document.getElementById('teste<?= $nomes->exib ?>').style.display='none';">Editar Contato</a>
                </div>
            </div>
        </div>
        <?  }  ?>
        <div class="card" style="width: 18rem;">
            <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    Contatos
                </span>
                <?foreach($nome as $nomes){?>
                <a href="#" onclick="document.getElementById('teste<?= $nomes->exib ?>').style.display='block';" class="list-group-item list-group-item-action list-group-item-light"><?= $nomes->nome, " ",   $nomes->sobrenome; ?></a>
                <?  }  ?>
            </div>
        </div>

        


        <!-- POPUP ADD CONTATO -->
        <div id="pop1" style="position: absolute; display:none; background-color: white;padding: 10px; margin-top:10px; border-radius:5px;">
            <div class="card">
                <span>ADICIONAR CONTATO</span>
                <br>
                <a href="#">
                    <img href="#" class="card-img-top" style="width: 200px; margin-left: 15px" src="../image/icon.jpg" alt="">
                </a>
                <div class="row">
                    <div class="col-md-12">
                        <form action="addContact.php" method="POST">
                            <div class="form-group">
                                <label for="contactName">Nome Contato</label>
                                <input type="text" name="contactName" class="form-control" id="contactName" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="contactName">Sobrenome Contato</label>
                                <input type="text" name="contactSobrenome" class="form-control" id="contactSobrenome" placeholder="Sobrenome">
                            </div>
                            <div class="form-group">
                                <label for="endereço">Endereço</label>
                                <input type="text" name="endereço" class="form-control" id="endereço" placeholder="Endereço">
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input name="bairro" class="form-control" id="bairro" type="text" placeholder="Bairro"></input>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input name="cidade" class="form-control" id="cidade" type="text" placeholder="Cidade"></input>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input name="estado" class="form-control" id="estado" type="text" placeholder="Estado"></input>
                            </div>
                            <div class="form-group">
                                <label for="pais">Pais</label>
                                <input name="pais" class="form-control" id="pais" type="text" placeholder="Pais"></input>
                            </div>
                            <div class="form-group">
                                <label for="telefoneFixo">Telefone Fixo</label>
                                <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" placeholder="(xx) xxxxx-xxxx">
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input name="celular" class="form-control" id="celular" type="text" placeholder="(xx) xxxxx-xxxx"></input>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input name="email" class="form-control" id="email" type="text" placeholder="usuario@dominio.com"></input>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">Adicionar</button>
                            <a class="btn btn-primary btn-lg" onclick="document.getElementById('pop1').style.display='none';" style="margin-left: 19px; color:white">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- JANELA PARA EDITAR CONTATO -->
        <?foreach($nome as $nomes){?>
        <div id="edit<?= $nomes->exib ?>" class="editar" style="position: absolute;margin-left: 20px; display:none; background-color: white;padding: 10px; margin-top:10px; border-radius:5px;">
            <a href="#" onclick="document.getElementById('edit<?= $nomes->exib ?>').style.display='none';">[X]</a>
            <br>
            <p style="margin-left: 40%">EDITAR</p>
            <a href="#">
                <img href="#" class="card-img-top" style="width: 200px; margin-left: 15px" src="../image/icon.jpg" alt="">
            </a>
            <div class="row"></div>
            <div class="col-md-12">
                <form action="EditContact.php?id_contact=<?= $nomes->id_contact?>" method="POST">
                    <div class="form-group">
                        <label for="contactName">Nome </label>
                        <input type="text" name="contactName" class="form-control" id="contactName" placeholder="<?= $nomes->nome?>">
                    </div>

                    <div class="form-group">
                        <label for="contactName">Sobrenome </label>
                        <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="<?= $nomes->sobrenome?>">
                    </div>
                    <div class="form-group">
                        <label for="endereço">Endereço</label>
                        <input type="text" name="endereço" class="form-control" id="endereço" placeholder="<?= $nomes->endereco?>">
                    </div>
                    <div class="form-group">
                        <label for="Bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" placeholder="<?= $nomes->bairro?>">
                    </div>
                    <div class="form-group">
                        <label for="Cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade" placeholder="<?= $nomes->cidade?>">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" class="form-control" id="estado" placeholder="<?= $nomes->estado?>">
                    </div>
                    <div class="form-group">
                        <label for="Pais">Pais</label>
                        <input type="text" name="pais" class="form-control" id="pais" placeholder="<?= $nomes->pais?>">
                    </div>
                    <div class="form-group">
                        <label for="telefoneFixo">Telefone Fixo</label>
                        <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" placeholder="<?= $nomes->telefoneFixo?>">
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input name="celular" class="form-control" id="celular" type="text" placeholder="<?= $nomes->telefoneMovel?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" class="form-control" id="email" type="text" placeholder="<?= $nomes->email?>"></input>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                    <a href="excludeContact.php?id_contact=<?= $nomes->id_contact?>" class="btn btn-primary btn-lg" style="margin-left: 19px">Excluir</a>
                </form>
            </div>
        </div>
        <?  }  ?>
    </div>

</body>

</html>
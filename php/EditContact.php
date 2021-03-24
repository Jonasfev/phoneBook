<?php
session_start();

class editDB{
    public $dados = null;

    function conectionDB(){
            $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
            $usuario = "unaux_26273168";
            $senha = "sa21dr07";
            try {
                $conexao = new PDO($dsn, $usuario, $senha);

                $query ="UPDATE db_contact  SET ";

                if($_POST['contactName'] != ""){
                    $query = $query." nome = :nome";
                }

                if($_POST['sobrenome'] != ""){
                    $query = $query.", sobrenome = :sobrenome";
                }

                if($_POST['endereço'] != ""){
                    $query =$query.", endereco = :endereco";
                }

                if($_POST['bairro'] != ""){
                    $query =$query.", bairro = :bairro";
                }

                if($_POST['cidade'] != ""){
                    $query =$query.", cidade = :cidade";
                }

                if($_POST['estado'] != ""){
                    $query =$query.", estado = :estado";
                }

                if($_POST['pais'] != ""){
                    $query =$query.", pais = :pais";
                }

                if($_POST['telefoneFixo'] != ""){
                    $query =$query.", telefoneFixo = :telefoneFixo";
                }

                if($_POST['celular'] != ""){
                    $query =$query.", telefoneMovel = :telefoneMovel";
                }

                if($_POST['email'] != ""){
                    $query =$query.", email = :email";
                }

                $query = $query. " where id_contact = ".$_GET["id_contact"];


                $stmt = $conexao->prepare($query);

                if($_POST['contactName'] != ""){
                    $stmt->bindValue(':nome', strtoupper($_POST['contactName']));
                }

                if($_POST['sobrenome'] != ""){
                    $stmt->bindValue(':sobrenome', $_POST['sobrenome']);
                }

                if($_POST['endereço'] != ""){
                    $stmt->bindValue(':endereco', $_POST['endereço']);
                }

                if($_POST['bairro'] != ""){
                    $stmt->bindValue(':bairro', $_POST['bairro']);
                }

                if($_POST['cidade'] != ""){
                    $stmt->bindValue(':cidade', $_POST['cidade']);
                }

                if($_POST['estado'] != ""){
                    $stmt->bindValue(':estado', $_POST['estado']);
                }

                if($_POST['pais'] != ""){
                    $stmt->bindValue(':pais', $_POST['pais']);
                }

                if($_POST['telefoneFixo'] != ""){
                    $stmt->bindValue(':telefoneFixo', $_POST['telefoneFixo']);
                }

                if($_POST['celular'] != ""){
                    $stmt->bindValue(':telefoneMovel', $_POST['celular']);
                }

                if($_POST['email'] != ""){
                    $stmt->bindValue(':email', $_POST['email']);
                }

                $stmt->execute();


            } catch (PDOException $e) {
                echo "<br>Erro: " . $e->getCode();
                echo "<br>Mensagem: " . $e->getMessage();
                echo "<br>Arquivo: " . $e->getFile();
                echo "<br>Linha: " . $e->getLine();
            } catch (Error $e) {
                echo "<br>Erro: " . $e->getCode();
                echo "<br>Mensagem: " . $e->getMessage();
                echo "<br>Arquivo: " . $e->getFile();
                echo "<br>Linha: " . $e->getLine();
            } 
        }
    }

$edit = new editDB();
$edit->conectionDB();

header('Location: home.php');
?>
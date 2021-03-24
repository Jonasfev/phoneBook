<?php
session_start();

class recoveryDB{
    public $dados = null;


    function conectionDB(){
            $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
            $usuario = "unaux_26273168";
            $senha = "sa21dr07";
            try {
                $conexao = new PDO($dsn, $usuario, $senha);

                if($_GET['pt'] != "1"){
                    $query = "select nome from db_contact INNER JOIN db_user ON db_contact.id_user = db_user.id WHERE db_user.id = :user";
                } else if ($_GET['pt'] == '1'){
                    $query = "select nome from db_contact INNER JOIN db_user ON db_contact.id_user = db_user.id WHERE db_user.id = :user AND nome = :nome";
                }
                $stmt = $conexao->prepare($query);

                
                if ($_GET['pt'] == "1"){
                    $stmt->bindValue(':nome', strtoupper($_GET['nome']));
                }
                $stmt->bindValue(':user', $_SESSION['user_id']);

                $stmt->execute();

                $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION['nomes'] = $dados;

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

$recover = new recoveryDB();
$recover->conectionDB();
?>
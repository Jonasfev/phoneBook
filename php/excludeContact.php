<?php
session_start();

class deleteDB{
    public $dados = null;

    function conectionDB(){
            $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
            $usuario = "unaux_26273168";
            $senha = "sa21dr07";
            try {
                $conexao = new PDO($dsn, $usuario, $senha);

                $query ="DELETE FROM db_contact WHERE db_contact.id_contact = :id_contact";

                $stmt = $conexao->prepare($query);
                
                $stmt->bindValue(':id_contact', $_GET['id_contact']);

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

$deleted = new deleteDB();
$deleted->conectionDB();
header('Location:home.php');
?>
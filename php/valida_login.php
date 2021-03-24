<?php
session_start();
class ValidLogin{
    public $dados = null;
    public $user_autenticado = false;

    function conectionDB(){
        if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
            $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
            $usuario = "unaux_26273168";
            $senha = "sa21dr07";
            try {
                $conexao = new PDO($dsn, $usuario, $senha);

                $query = "select * from db_user where ";
                $query .= "usuario = :usuario ";
                $query .= "AND senha = :senha ";

                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':usuario', $_POST['usuario']);
                $stmt->bindValue(':senha', $_POST['senha']);
                $stmt->execute();

                $dados = $stmt->fetch();

                $this->validado($dados);
                
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
        } else{
            $_SESSION['autenticado'] = 'NÃO';
            header('Location: ../index.php?login=erro');
        }
    }

    function validado($dados){
        /* verificar login e senha, recuperar dados do arquivo */
        if ($dados['usuario'] == $_POST['usuario'] && $dados['senha'] == $_POST['senha']) {
            $user_autenticado = true;
        }
        /* caso login e senha estajam corretos definir as variaveis da sessão */

        if ($user_autenticado) {
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['nome'] = $_POST['usuario'];
            $_SESSION['user_id'] = $dados['id'];
            header('Location: home.php');

            /* error caso login esteja invalido */
        } else {
            $_SESSION['autenticado'] = 'NÃO';
            header('Location: ../index.php?login=erro');
        }
    }
}

$valid = new ValidLogin();
$valid->conectionDB();

?>
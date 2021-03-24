<?php
session_start();
$_SESSION['contatos'] = array();
class Contact{
    public $nome = null;
    public $sobrenome = null;
    public $endereco = null;
    public $bairro = null;
    public $cidade = null;
    public $estado = null;
    public $pais = null;
    public $telefoneFixo = null;
    public $telefoneMovel = null;
    public $email = null;

    function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }

    function addDB(){
        array_push($_SESSION['contatos'], $this);
    }
}

        $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
        $usuario = "unaux_26273168";
        $senha = "sa21dr07";

        try {
            $conexao = new PDO($dsn, $usuario, $senha);
            $query = "select * from db_contact INNER JOIN db_user ON db_contact.id_user = db_user.id WHERE db_user.id = :user";

            $stmt = $conexao->prepare($query);


            $stmt->bindValue(':user', $_SESSION['user_id']);

            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            setContact($dados);
            

            
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
    

    function setContact($dados){
        $a = 0;
        
        foreach($dados as $contatos){
            $contact = new Contact;
            $contact->__set("id_contact", $contatos['id_contact']);
            $contact->__set("nome", $contatos['nome']);
            $contact->__set("sobrenome", $contatos['sobrenome']);
            $contact->__set("endereco", $contatos['endereco']);
            $contact->__set("bairro", $contatos['bairro']);
            $contact->__set("cidade", $contatos['cidade']);
            $contact->__set("estado", $contatos['estado']);
            $contact->__set("pais", $contatos['pais']);
            $contact->__set("telefoneFixo", $contatos['telefoneFixo']);
            $contact->__set("telefoneMovel", $contatos['telefoneMovel']);
            $contact->__set("email", $contatos['email']);
            $contact->__set("exib", $a);
            $a++;
            $contact->addDB();
        }

    }




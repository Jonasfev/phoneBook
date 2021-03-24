<?php
session_start();

class addContact{
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
        $dsn = "mysql:host=sql308.unaux.com;dbname=unaux_26273168_Agenda";
        $usuario = "unaux_26273168";
        $senha = "sa21dr07";

        try {
            $conexao = new PDO($dsn, $usuario, $senha);

            $query = "INSERT INTO db_contact (nome, sobrenome, endereco, bairro, cidade, estado, pais, telefoneFixo, telefoneMovel, email, id_user)";
            $query .= " VALUES (:nome, :sobrenome, :endereco, :bairro, :cidade, :estado, :pais, :telefoneFixo, :telefoneMovel, :email, :userID);";


            $stmt = $conexao->prepare($query);

            echo $this->nome;

            echo $this->email;

            $stmt->bindValue(':nome', strtoupper($this->nome));
            $stmt->bindValue(':sobrenome',strtoupper($this->sobrenome));
            $stmt->bindValue(':endereco', $this->endereco);
            $stmt->bindValue(':bairro', $this->bairro);
            $stmt->bindValue(':cidade', $this->cidade);
            $stmt->bindValue(':estado', $this->estado);
            $stmt->bindValue(':pais', $this->pais);
            $stmt->bindValue(':telefoneFixo', $this->telefoneFixo);
            $stmt->bindValue(':telefoneMovel', $this->telefoneMovel);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':userID', $_SESSION['user_id']);


            $stmt->execute();

            $dados = $stmt->fetch();
            echo "<pre>";
            print_r($dados);
            echo "</pre>";
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


$contact = new addContact;
$contact->__set("nome", $_POST['contactName']);
$contact->__set("sobrenome", $_POST['contactSobrenome']);
$contact->__set("endereco", $_POST['endereço']);
$contact->__set("bairro", $_POST['bairro']);
$contact->__set("cidade", $_POST['cidade']);
$contact->__set("estado", $_POST['estado']);
$contact->__set("pais", $_POST['pais']);
$contact->__set("telefoneFixo", $_POST['telefoneFixo']);
$contact->__set("telefoneMovel", $_POST['celular']);
$contact->__set("email", $_POST['email']);

$contact->addDB();

array_push($_SESSION['contatos'], $contact);

header('Location:home.php');

?>

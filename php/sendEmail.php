<?php

    session_start();

    require "../lib/PHPMailer/Exception.php";
    require "../lib/PHPMailer/OAuth.php";
    require "../lib/PHPMailer/PHPMailer.php";
    require "../lib/PHPMailer/POP3.php";
    require "../lib/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atrib){
            return $this->$atrib;
        }

        public function __set($atrib, $valor){
            $this->$atrib = $valor;
        }

        public function mensagemValida(){
            if (empty($_GET["para"]) || empty($_POST["assunto"]) || empty($_POST["mensagem"])) {
                return false;
            } else {
                return true;
            }
        }
    }

    $mensagem = new Mensagem();
    $mensagem->para = $_GET["para"];
    $mensagem->assunto = $_POST["assunto"];
    $mensagem->mensagem = $_POST["mensagem"];

    $mail = new PHPMailer(true); 

    if (!$mensagem->mensagemValida()){
        echo "Falta o preenchimento de algum campo";
    }

    try {
        //configurações do servidor
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "agenda.padraoenvio@gmail.com";
        $mail->Password = "Agenda@padrao666envio";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        
        $mail->setFrom("agenda.padraoenvio@gmail.com","Web Completo");
        $mail->addAddress($mensagem->para);
        // $mail->addReplyTo();
        // $mail->addCC();
        // $mail->addBCC();

        $mail->isHTML(true);
        $mail->Subject = $mensagem->assunto;
        $mail->Body = $mensagem->mensagem;
        $mail->AltBody = "É necessário um cliente de e-mail que interprete HTML";

        $mail->send();

        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = "E-mail enviado com sucesso";
    } catch(Exception $e) {
        $mensagem->status['codigo_status'] = 2;
        $mensagem->status['descricao_status'] = "Não foi possível enviar este e-mail! Por favor tente novamente mais tarde.<br>Detalhes do erro: " . $mail->ErroInfo;
    }

    header('Location: home.php?inclusao=1')
?>
<?php


namespace Controllers;


use App\Response;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController {

    public function contact() {
        $mail = new PHPMailer(True);

        $mail->isSMTP();
        $mail->Host = 'smtp.sfr.fr';
        $mail->SMTPAuth = true; // Activer authentication SMTP
        $mail->Username = 'kylianzhiti@sfr.fr'; // Votre adresse email d'envoi
        $mail->Password = 'itmc74VP'; // Le mot de passe de cette adresse email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
        $mail->Port = 465;
        $mail->setFrom('kylianzhiti@sfr.fr', 'Mailer'); // Personnaliser l'envoyeur
        $mail->addAddress('kylianzh@gmail.com', 'Kylian ZHITI'); // Ajouter le destinataire
        $mail->Subject = 'Prise de contact pour un projet';
        if (isset($_POST['nom'])) {
            $error = 0;
            if (empty($_POST['nom'])) {
                $error++;
            }
            if (empty($_POST['email'])) {
                $error++;
            }
            if (empty($_POST['message'])) {
                $error++;
            }
            if ($error === 0) {
                $mail->Body = "Vous avez reçu un message\n
                 nom : ".$_POST['nom']."\n
                 email : ".$_POST['email']."\n
                 message : ".$_POST['message'].".";
                //mail('kylianzh@gmail.com', 'Prise de contact pour un projet', $message);
                $mail->send();
            }
        }
        Response::redirect('index.php');
        return;
    }
}

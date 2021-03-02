<?php


namespace Controllers;

class ContactController {

    public function contact() {
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
                $message = "Vous avez reçu un message\n
                 nom : ".$_POST['nom']."\n
                 email : ".$_POST['email']."\n
                 message : ".$_POST['message'].".";
                mail('kylianzh@gmail.com', 'Prise de contact pour un projet', $message);
            }
        }
        header('Location: index.php');
        return;
    }
}

<?php

$oContactsManager = new ContactsManager($pdo);
$captcha = new Recaptcha('6LduRzYUAAAAACt5WMC2Gd1ccaze5oPZEtCdFV_m');

try {
        // Envoie du mail via le formulaire de contact
        if (isset($_POST['name'], $_POST['mail'], $_POST['content'])) {

                // Vérification des champs du formulaire

                if (empty($_POST['name'])) {
                        throw new Exception("Veuillez entrer votre nom !");
                }

                if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        throw new Exception("Veuillez entrer une adresse email valide !");
                }

                if (empty($_POST['content'])) {
                        throw new Exception("Un mail vide, ça me sera utile :-)");
                }

                if($captcha->checkCode($_POST['g-recaptcha-response']) === false){
                     throw new Exception("Le captcha est invalide");
                }

                // On enlève les espaces inutiles et les slashs / back-slashs \ avec trim() et stripslashes()
                foreach($_POST as $index => $valeur) {
                        $$index = stripslashes(trim($valeur));
                }

                // On définit les paramètres de l'email
                define('MAIL_DESTINATAIRE', 'leuiller.cedric@gmail.com');
                define('MAIL_SUBJECT', 'Message de formulaire du Portfolio');

                //Préparation de l'entête du mail:
                $mail_entete  = "MIME-Version: 1.0\r\n";
                $mail_entete .= "From: {$_POST['name']}"
                ."<{$_POST['mail']}>\r\n";
                $mail_entete .= 'Reply-To: '.$_POST['mail']."\r\n";
                $mail_entete .= 'Content-Type: text/plain; charset="utf-8"';
                $mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
                $mail_entete .= 'X-Mailer:PHP/' . phpversion()."\r\n";

                // préparation du corps du mail
                $mail_corps  = "Message de : $name\n";
                $mail_corps .= "Mail : $mail\n";
                $mail_corps .= $content;

                // envoi du mail
                if (!mail(MAIL_DESTINATAIRE,MAIL_SUBJECT,$mail_corps,$mail_entete)) {
                        //Le mail n'a pas été expédié
                        throw new Exception("Une erreur est survenue lors de l'envoi du formulaire par email");

                } else {
                        //Le mail est bien expédié
                        $_SESSION['mail'] = 1;

                        $name = htmlspecialchars($_POST['name']);
                        $mail = htmlspecialchars($_POST['mail']);
                        $content = htmlspecialchars($_POST['content']);
                        $oContactsManager->newContact($name, $mail, $content);

                        header('Location:index.php?page=home');
                        die();
                }


        }

} catch (Exception $e) {
        $sError = $e->getMessage();
}

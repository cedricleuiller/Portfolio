<?php
if (isset($_POST['logOut'])) {
        session_unset();
        session_destroy();
        header('Location:index.php');
        die();
}

if (isset($_POST['admin'])) {

        if (isset($_POST['username'], $_POST['password'])) {

                try {

                        $usersManager = new UsersManager($pdo);
                        $user = $usersManager->findByUsername($_POST['username']);

                        if (!$user) {
                                throw new Exception("Utilisateur introuvable");
                        }
                        if (!$user->verifPassword($_POST['password'])) {
                                throw new Exception("Mot de passe incorrect");
                        }

                        $_SESSION['admin'] = 1;
                        header('Location:index.php?page=home');
                        die();


                } catch (Exception $e) {
                        var_dump($e);
                        $error = $e->getMessage();
                }



        }

}

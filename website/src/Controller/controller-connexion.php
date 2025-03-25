<?php
include_once "../../config.php";

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username'])) {
        if (empty($_POST['username'])) {
            $errors['username'] = "Rentrez votre pseudo ou votre mail";
        }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = "Rentrez votre mot de passe";
        }
    }

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifie si le mail ou le pseudo de l'utilisateur existe bien
        $sql = "SELECT * FROM users WHERE user_pseudo = :username OR user_mail = :username;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->rowCount() == 0 ? $found = false : $found = true;
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($found == false) {
            $errors['connexion'] = 'Identifiant ou mot de passe incorrect';
        } else {
            // Vérifie le mot de passe de l'utilisateur
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                unset($_SESSION['user_password']);
                header('Location: /controller-index.php');
                exit;

            } else {
                $errors['connexion'] = "Identifiant ou mot de passe incorrect";
            }
        }
    }
}



include_once "../View/view-connexion.php";
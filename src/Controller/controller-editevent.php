<?php
include_once "../../config.php";

include_once "../Model/model-events.php";

include_once "../../config.php";

$errors = [];
$classicregex = "/^[^#%^&*\][;}{=+\\|><\`~]*$/";

function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}

if (!empty($_GET['event']) and is_numeric($_GET['event'])) {
    $event = Events::showEvent($_GET['event']);
    if (empty($event) or $event['user_id'] != $_SESSION['user_id']) {
        header('location: controller-index.php');
        exit;
    } else {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty(safeInput($_POST['name']))) {
                if (!preg_match($classicregex, $_POST['name'])) {
                    $errors['name'] = "Caractères non valide";
                }
            } else {
                $errors['name'] = "Veuillez rentrer un nom pour l'évènement";
            }

            if (empty($_POST['genre']) or !is_numeric($_POST['genre'])) {
                $errors['genre'] = "Veuillez entrer un genre pour l'évènement";
            }

            if (empty($_POST['date'])) {
                $errors['date'] = "Veuillez rentrer la date de l'évènement";
            }

            if (empty($_POST['hour'])) {
                $errors['hour'] = "Veuillez rentrer l'heure de l'évènement";
            }

            if (!empty($_POST['price'])) {
                if (!is_numeric($_POST['price'])) {
                    $errors['price'] = "Veuillez rentrer des caractères numériques";
                }
            }

            if (!empty(safeInput($_POST['description']))) {
                if (!preg_match($classicregex, $_POST['description'])) {
                    $errors['description'] = "Caractères non valide";
                }
            } else {
                $errors['description'] = "Veuillez rentrer une description de l'évènement";
            }

            if (!empty(safeInput($_POST['emplacement']))) {
                if (!preg_match($classicregex, $_POST['emplacement'])) {
                    $errors['emplacement'] = "Caractères non valide";
                }
            } else {
                $errors['emplacement'] = "Veuillez rentrer l'emplacement de l'évènement";
            }

            if (!empty(safeInput($_POST['adress']))) {
                if (!preg_match($classicregex, $_POST['adress'])) {
                    $errors['adress'] = "Caractères non valide";
                }
            } else {
                $errors['adress'] = "Veuillez rentrer l'adresse exacte de l'évènement";
            }


            if (empty($errors)) {

                $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "UPDATE `events` SET `event_name` = :name, 
                                `event_date` = :date,
                                `event_hour` = :hour,
                                `event_description` = :description,
                                `event_adress` = :adress,
                                `event_emplacement` = :emplacement,
                                `event_price` = :price,
                                `genre_id` = :genre";

                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':name', safeInput($_POST['name']), PDO::PARAM_STR);
                $stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
                $stmt->bindValue(':hour', $_POST['hour'], PDO::PARAM_STR);
                $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
                $stmt->bindValue(':adress', safeInput($_POST['adress']), PDO::PARAM_STR);
                $stmt->bindValue(':emplacement', safeInput($_POST['emplacement']), PDO::PARAM_STR);
                $stmt->bindValue(':price', safeInput($_POST['price']), PDO::PARAM_INT);
                $stmt->bindValue(':genre', $_POST['genre'], PDO::PARAM_INT);

                if ($stmt->execute()) {
                    header("Location: controller-event.php?event=" . $event['event_id']);
                    exit;
                }

                $pdo = '';
            }
        }
    }
} else {
    header('location: controller-index.php');
    exit;
}









include_once "../View/view-editevent.php";

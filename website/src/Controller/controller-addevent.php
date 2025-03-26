<?php
include_once "../../config.php";
session_start();
include_once "../Model/model-events.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}

$errors = [];
$classicregex = "/^[^#%^&*\][;}{=+\\|><\`~]*$/";


function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name'])) {
        if (!preg_match($classicregex, $_POST['name'])) {
            $errors['name'] = "Caractères non valide";
        }
    } else {
        $errors['name'] = "Veuillez rentrer une description de l'évènement";
    }

    if (!empty($_POST['tag'])) {
        if (!preg_match($classicregex, $_POST['tag'])) {
            $errors['tag'] = "Caractères non valide";
        }
    } else {
        $errors['tag'] = "Veuillez rentrer le genre de l'évènement";
    }

    if (empty($_POST['date'])) {
        $errors['date'] = "Veuillez rentrer la date de l'évènement";
    }

    if (empty($_POST['hour'])) {
        $errors['hour'] = "Veuillez rentrer l'heure de l'évènement";
    }

    if(!empty($_POST['price'])){
        if (!is_numeric($_POST['price'])) {
            $errors['price'] = "Veuillez rentrer des caractères numériques";
        }
    }

    if (!empty($_POST['description'])) {
        if (!preg_match($classicregex, $_POST['description'])) {
            $errors['description'] = "Caractères non valide";
        }
    } else {
        $errors['description'] = "Veuillez rentrer une description de l'évènement";
    }

    if (!empty($_POST['place'])) {
        if (!preg_match($classicregex, $_POST['place'])) {
            $errors['place'] = "Caractères non valide";
        }
    } else {
        $errors['place'] = "Veuillez rentrer l'emplacement de l'évènement";
    }

    if (!empty($_POST['address'])) {
        if (!preg_match($classicregex, $_POST['address'])) {
            $errors['address'] = "Caractères non valide";
        }
    } else {
        $errors['address'] = "Veuillez rentrer l'adresse exacte de l'évènement";
    }

    if ($_FILES['image']['error'] == 4) {
        $errors['image'] = "Veuillez choisir une photo";
    }


    var_dump($_POST);

    if (empty($errors)) {

        // Direction du fichier et rename
        $newName = uniqid() . "_" . basename($_FILES["image"]["name"]);

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `events` (`event_name`, `event_date`, `event_hour`, `event_description`, `event_adress`, `event_emplacement`, `event_price`, `event_img`, `user_id`) VALUES
                    (:name,
                     :date,
                     :hour,
                     :description,
                     :adress,
                     :emplacement,
                     :price,
                     :img,
                     :user_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', safeInput($_POST['name']), PDO::PARAM_STR);
        $stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
        $stmt->bindValue(':hour', $_POST['hour'], PDO::PARAM_STR);
        $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
        $stmt->bindValue(':adress', safeInput($_POST['address']), PDO::PARAM_STR);
        $stmt->bindValue(':emplacement', safeInput($_POST['place']), PDO::PARAM_STR);
        $stmt->bindValue(':price', safeInput($_POST['price']), PDO::PARAM_INT);
        $stmt->bindValue(':img', $newName, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: controller-index.php");

            $target_dir = "../../assets/img/eventimg/";
            $target_file = $target_dir . $newName;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            mkdir($target_dir);
    
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["tmp_name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            exit;
        }

        $pdo = '';


    }
}



include_once "../View/view-addevent.php";

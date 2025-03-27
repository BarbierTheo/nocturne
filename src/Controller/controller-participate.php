<?php
session_start();
include_once '../../config.php';
include_once '../Model/model-participate.php';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si l'user participe déjà, alors on supprime la participation
if (Participate::alreadyParticipate($_GET['event'], $_SESSION['user_id'])) {

    $sql = "DELETE FROM `user_participate_event` WHERE `event_id` = " . $_GET['event'] . " AND `user_id` = " . $_SESSION['user_id'];

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "dontParticipate";

    // Si l'user n'a pas liké, alors on l'ajoute du tableau likes
} else {

    $sql = "INSERT INTO `user_participate_event` (`user_id`, `event_id`) VALUES (" . $_SESSION['user_id'] . ", " . $_GET['event']. ")";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "participate";
}

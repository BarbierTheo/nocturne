<?php
include_once "../../config.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si l'URL contient un utilisateur
if (isset($_GET['event'])) {
    $searchName = $_GET['event'] . "%";
    $sql = "SELECT * FROM `events`
        WHERE `event_name` LIKE :event
        ORDER BY `event_date` ASC;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':event', $searchName, PDO::PARAM_STR);
    $stmt->execute();
    $searchPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = '';
} else {
    // Si l'URL ne contient pas d'utilisateur
    $sql = "SELECT * FROM `events`
        ORDER BY `event_date` ASC
        LIMIT 9";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $searchPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = '';
}



include_once "../View/view-search.php";

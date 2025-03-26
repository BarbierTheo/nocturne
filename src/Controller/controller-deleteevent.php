<?php 
include_once "../../config.php";
include_once "../Model/model-events.php";
session_start();


if(isset($_GET['event']) AND !empty($_GET['event']) AND is_numeric($_GET['event']) AND isset($_SESSION['user_id'])) {
    $event = Events::showEvent($_GET['event']);
    if (empty($event) OR $event['user_id'] != $_SESSION['user_id']){
        header('location: controller-index.php');
        exit;
    } else {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM `events` 
        WHERE `event_id` = " . $_GET['event'];
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();
        
        $pic_path = "../../assets/img/eventimg/" . $event['event_img'];
        unlink("$pic_path");
        
        header('location: controller-index.php');

    }
} else {
    header('location: controller-index.php');
    exit;
}

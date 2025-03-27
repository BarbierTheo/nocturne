<?php
include_once "../../config.php";
include_once "../Model/model-events.php";
include_once "../Model/model-participate.php";
include_once "../Model/model-users.php";


session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}

$profile = Users::showUser($_SESSION['user_id']);

$events = Events::showEventsCreated($_SESSION['user_id']);

include_once "../View/view-profile.php";
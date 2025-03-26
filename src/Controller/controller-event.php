<?php
include_once "../../config.php";

include_once "../Model/model-events.php";
include_once "../Model/model-participate.php";

include_once "../../config.php";
session_start();

if (isset($_GET['event']) and !empty($_GET['event']) and is_numeric($_GET['event'])) {

    $event = Events::showEvent($_GET['event']);

    if (empty($event)) {
        header('location: controller-index.php');
        exit;
    }
} else {

    header('location: controller-index.php');
    exit;
}







include_once "../View/view-event.php";

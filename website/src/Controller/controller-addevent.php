<?php
include_once "../../config.php";
session_start();
include_once "../Model/model-events.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}


include_once "../View/view-addevent.php";
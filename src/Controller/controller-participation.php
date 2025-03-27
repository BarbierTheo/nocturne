<?php
include_once "../../config.php";

include_once "../Model/model-events.php";
include_once "../Model/model-participate.php";


session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}


include_once "../View/view-participation.php";

<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: controller-connexion.php');
    exit;
}

include_once "../../config.php";
include_once "../Model/model-users.php";
include_once "../Model/model-events.php";
include_once "../Model/model-artists.php";
include_once "../Model/model-participate.php";







include_once "../../index.php";
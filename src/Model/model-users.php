<?php
class Users {

    public static function showUser($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_pseudo`, `user_mail`, `user_firstname`, `user_lastname` FROM `users` WHERE `user_id` = " . $user_id;
        $stmt = $pdo->query($sql);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return $profile;

    }

    public static function countCreate($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(*) AS `total` FROM `events`
        WHERE `user_id` = " . $user_id;
        $stmt = $pdo->query($sql);
        $countCreate = $stmt->fetch(PDO::FETCH_ASSOC);
        return $countCreate['total'];

    }

    public static function countParticipate($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(*) AS `total` FROM `user_participate_event`
        WHERE `user_id` = " . $user_id;
        $stmt = $pdo->query($sql);
        $countParticipate = $stmt->fetch(PDO::FETCH_ASSOC);
        return $countParticipate['total'];

    }

}
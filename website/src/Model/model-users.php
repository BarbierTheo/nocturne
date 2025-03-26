<?php
class Users {

    public static function showUser($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_pseudo`, `user_mail` FROM `users` WHERE `user_id` = " . $user_id;
        $stmt = $pdo->query($sql);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return $profile;

    }


}
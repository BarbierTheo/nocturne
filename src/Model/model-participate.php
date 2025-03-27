<?php
class Participate {

    public static function showParticipants($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_id`, `user_pseudo` FROM `user_participate_event`
        NATURAL JOIN `users`
        WHERE `event_id` = ". $event_id;
        $stmt = $pdo->query($sql);
        $participants = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $participants;
    }

    public static function alreadyParticipate($event_id, $user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_id` FROM `user_participate_event`
                NATURAL JOIN `users`
                WHERE `event_id` = " . $event_id . " AND `user_id` = " . $user_id;
        $stmt = $pdo->query($sql);
        $participate = $stmt->fetch(PDO::FETCH_ASSOC);
        return $participate;
    }

    public static function countParticipants($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(`user_id`) AS `total` FROM `user_participate_event`
                NATURAL JOIN `users`
                WHERE `event_id` = " . $event_id;
        $stmt = $pdo->query($sql);
        $participate = $stmt->fetch(PDO::FETCH_ASSOC);
        return $participate['total'];
    }



}
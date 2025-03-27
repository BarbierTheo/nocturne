<?php
class Events
{

    public static function showEvent($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `events` NATURAL JOIN `genre` WHERE `event_id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $event_id, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;
    }

    public static function showEventsCreated($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `events` WHERE `user_id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }


    public static function showEventsPerso($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `user_participate_event`
                WHERE `user_id` = " . $user_id;

        $stmt = $pdo->query($sql);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }

    public static function showEvents($howMany)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `events`
                ORDER BY event_date ASC
                LIMIT " . $howMany;
        $stmt = $pdo->query($sql);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }

    public static function showAllGenres()
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `genre`";
        $stmt = $pdo->query($sql);
        $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $genres;
    }
}

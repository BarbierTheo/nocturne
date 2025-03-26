<?php
class Events {

    public static function showEvent($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `events` WHERE `event_id` = " . $event_id;
        $stmt = $pdo->query($sql);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;

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

    public static function showTags($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `tag` FROM `tags`
                NATURAL JOIN `event_tags`
                WHERE event_id = " . $event_id;
        $stmt = $pdo->query($sql);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;

    }

    public static function showAllTags()
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `tag` FROM `tags`
                NATURAL JOIN `event_tags`";
        $stmt = $pdo->query($sql);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;

    }

}
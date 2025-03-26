<?php
class Artists {

    public static function showArtists($event_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `artist_name`, `artist_link` FROM `artists`
                NATURAL JOIN `event_artists`
                WHERE event_id = " . $event_id;
        $stmt = $pdo->query($sql);
        $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $artists;

    }

}
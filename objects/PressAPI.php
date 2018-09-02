<?php
class PressAPI {
    static public function getPressList() {
        $db = Database::connect();
        return $db->query("select * from press order by id desc");
    }
    
    static public function getFeaturedPressList() {
        $db = Database::connect();
        return $db->query("select * from press order by id desc limit 2");
    }

    static public function getPressByURLname($urlname) {
        $db = Database::connect();
        $statement = $db->query("select * from press where urlname = '$urlname'");
        return $statement->fetch();
    }
}
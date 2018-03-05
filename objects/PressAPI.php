<?php
class PressAPI {
    static public function getPressList()
    {
        $db = Database::connect();
        return $db->query("select * from press");
    }
    
    static public function getFeaturedPressList()
    {
        $db = Database::connect();
        return $db->query("select * from press where featured = 1");
    }
}
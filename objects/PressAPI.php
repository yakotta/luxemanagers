<?php
class PressAPI {
    static public function getPressList()
    {
        $db = connect();
        $result = $db->query("select * from press");
        return $result;
    }
    
    static public function getFeaturedPressList()
    {
        $db = connect();
        $result = $db->query("select * from press where featured = 1");
        return $result;
    }
}
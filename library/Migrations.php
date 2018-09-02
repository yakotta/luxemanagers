<?php

class Migrations {
    // Checks migrations in the database
    static public function check($m) {
        $database = new Database();
        $db = $database->getPDO();

        if(!$database->findTable("migrations")) return false;

        $m = basename($m);
    
        $result = $db->query("select filename from migrations where filename = '$m'");
    
        if($result === false) return false;
        
        if($result->rowCount() == 0) return false;
        
        return true;
    }
    
    // Adds migrations to the database table 
    static public function add($m) {
        $db = Database::connect();
    
        $m = basename($m);
        
        $db->query("insert into migrations set filename='$m'");
    }
}
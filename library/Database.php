<?php

class Database {
    static public function connectDocker()
    {
        return [getenv("MYSQL_HOST"),"root","root","luxemanagers",3306];
    }
    
    static public function connectAntimatterServer()
    {
        return ["localhost","luxemanagers","j4z132gs63c0y8hr","luxemanagers",3306];
    }
    
    static public function connectMAMP()
    {
        return ["localhost","root","root","luxemanagers",3306];
    }
    
    static public function connectC9()
    {
        return [getenv('IP'),getenv('C9_USER'),"","luxemanagers",3306];
    }
    
    // Creates a database connections
    static public function connect()
    {
        // We have to detect where our code is running, so we can use the right database details
        // The database on your MAMP laptop setup is different from my docker setup and my antimatter server setup
        if(getenv("IS_DOCKER")){
            // Jenna, ask me what this list does and I will explain, it looks far more complicated then it is in reality
            list($hostname,$username,$password,$database,$port) = Database::connectDocker();
        }else if(strpos(__DIR__,"clients.antimatter-studios.com") !== false) {
            list($hostname,$username,$password,$database,$port) = Database::connectAntimatterServer();
        }else if(getenv("C9_HOSTNAME")) {
            list($hostname,$username,$password,$database,$port) = Database::connectC9();
        }else {
            list($hostname,$username,$password,$database,$port) = Database::connectMAMP();
        }
    
        // Create connection
        $db = new mysqli($hostname, $username, $password, $database, $port);
        
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        } 
        
        // return the connection to the calling script, so it can be used elsewhere
        return $db;
    }
}
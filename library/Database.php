<?php
/**
 * class: Database
 *
 * A class which controls access to our database
 *
 * help: https://phpdelusions.net/pdo
 */
class Database
{
    // Introduces the $connection member variable
    public $connection;
    // The name of the database we use for the website
    private $name = "luxemanagers";
    
    // 4 functions which establish which connection parameters to use, depending on environment
    private function connectDocker()
    {
        return [getenv("MYSQL_HOST"),"root","root",$this->getDatabaseName(),3306];
    }

    private function connectAntimatterServer()
    {
        return ["localhost","luxemanagers","j4z132gs63c0y8hr",$this->getDatabaseName(),3306];
    }

    private function connectC9()
    {
        return [getenv('IP'),getenv('C9_USER'),"",$this->getDatabaseName(),3306];
    }

    private function connectMAMP()
    {
        return ["localhost","root","root",$this->getDatabaseName(),3306];
    }

    // Object constructor. Here
    public function __construct()
    {
        // Determines what environment we're in
        if(getenv("IS_DOCKER")){
            $params = $this->connectDocker();
        }else if(strpos(__DIR__,"clients.antimatter-studios.com") !== false) {
            $params = $this->connectAntimatterServer();
        }else if(getenv("C9_HOSTNAME")) {
            $params = $this->connectC9();
        }else {
            $params = $this->connectMAMP();
        }

        // Takes the parameters and quickly puts them into easy-to-use variables
        list($hostname,$username,$password,$database,$port) = $params;

        // Database connnection string, it's how the database knows how to connect
        $dsn = "mysql:dbname=$database;host=$hostname;port=$port;charset=utf8";

        // Creates new PDO, which is the actual connection to the database using database credentials
        $this->connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,  // throw an exception when you have an error
            PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC         // return associative arrays from the database
        ]);
    }

    public function getDatabaseName()
    {
        return $this->name;
    }

    public function getPDO()
    {
        return $this->connection;
    }

    // This papers over the fact that we changed how the db connection is formed, and preserves old functionality
    // This is not really the correct thing to do, but I wanted to go step by step towards the right solution eventually
    // But this is kinda ugly :/
    static public function connect()
    {
        $database = new Database();

        return $database->getPDO();
    }

    public function findTable($name)
    {
        $database = $this->getDatabaseName();

        $result = $this->connection->query("select table_name from information_schema.tables where table_schema = '$database' and table_name = '$name'");

        // If the row count is greater than zero, it means we found the migrations table, so we return true; yes, we are initialised
        // otherwise false: no we are not initialised and must be initialised to continue
        return $result->rowCount() > 0;
    }
}
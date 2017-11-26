<?php

// Preformats the var dump function
function var_dump_pre ($input_variable)
{
    print("<pre>");
    var_dump($input_variable);
    print("</pre>");
}

// Checks migrations in the database
function check_migration($m)
{
    $db = connect();
    $result = $db->query("select filename from migrations where filename = '$m'");

    if($result === false) return false;
    
    if($result->num_rows == 0) return false;
    
    return true;
}

// Adds migrations to the database table 
function add_migration($m)
{
    $db = connect();
    
    $db->query("insert into migrations set filename='$m'");
}

function connectDocker()
{
    return [getenv("MYSQL_HOST"),"root","root","luxemanagers",3306];
}

function connectAntimatterServer()
{
    return ["localhost","luxemanagers","j4z132gs63c0y8hr","luxemanagers",3306];
}

function connectMAMP()
{
    return ["localhost","root","root","luxemanagers",3306];
}

// Creates a database connections
function connect()
{
    // We have to detect where our code is running, so we can use the right database details
    // The database on your MAMP laptop setup is different from my docker setup and my antimatter server setup
    if(getenv("MYSQL_HOST")){
        // Jenna, ask me what this list does and I will explain, it looks far more complicated then it is in reality
        list($hostname,$username,$password,$database,$port) = connectDocker();
    }else if(strpos(__DIR__,"clients.antimatter-studios.com") !== false) {
        list($hostname,$username,$password,$database,$port) = connectAntimatterServer();
    }else {
        list($hostname,$username,$password,$database,$port) = connectMAMP();
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

// Renders templates
function render_template($template_name, $template_parameters=[])
{
    if(!is_array($template_parameters)) {
        $template_parameters = [];
        error_log("Template parameters for template '$template_name' were invalid, but I fixed it :* ");
    }

    // extract() creates new variables from array keys, so if an array has a key "field" then it creates a variable $field
    // so this function is very useful for creating lots of variables, from an entire array of keys
    // we do this here, because we do not know if the template being rendered has zero parameters or one hundred
    // so we can easily pass the required parameters using an array, each key being the variable required by the template
    // and each value of the key, being assigned to the variable it will eventually create
    // extract is sometimes seen as "magic", because it "magics" variables into existence
    // however in this case, its extremely useful, because it allows us to pass an array of any number of keys
    // and not deal with the "fiddly details" of knowing what parameters are needed
    extract($template_parameters, EXTR_SKIP);

    // output buffering is very useful, it allows us to grab the entire "output" of a function call, or code block
    // and then put all the printed output into a variable (in this case, $template)
    // this also stops functions from randomly outputting html to the browser, this function acts as a catch-all
    // it catches __EVERYTHING__ and scoops it all up into a buffer
    // then when you call ob_get_clean(), it puts all the content you scooped up, into a variable, nice and simple!
    ob_start();
    include($template_name);
    $template = ob_get_clean();
    
    return $template;
}

// Checks the paramters 
function check_parameters ($source, $parameters=[]) {
    var_dump_pre($source);
    var_dump_pre($parameters);
    foreach($parameters as $field) {
        if(!array_key_exists($field, $source) || empty($source[$field])){
            return $field;
        }
    }
    return true;
}

// Redirect function
function redirect($url) {
    header("Location: $url");
    die("Waiting to redirect to '$url'");
}

// Rewrites a requested url based on website location 
function rewrite_url($url) {
    $base = str_replace($_SERVER["DOCUMENT_ROOT"], "", __DIR__);
    $base = str_replace("/resources", "", $base);
    // Make sure the url begins with /
    $rewritten_url = "/".$base.$url;
    // Make sure any double slashes // are replaced with single slash /
    $rewritten_url = str_replace("//","/",$rewritten_url);

    return $rewritten_url;
}
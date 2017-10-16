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

// Creates a database connections
function connect()
{
    // On docker, we need to use the environment variable
    // On MAMP, we need to use localhost, so this line of code decides between both options automatically
    $hostname = getenv("MYSQL_HOST") ?: "localhost";
    $username = "root";
    $password = "root";
    $database = "luxemanagers";
    $dbport = 3306;
    
    // Create connection
    $db = new mysqli($hostname, $username, $password, $database, $dbport);
    
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
    
    extract($template_parameters, EXTR_SKIP);
    
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

// Gets resources
function get_resource($resource) {
    $base = str_replace($_SERVER["DOCUMENT_ROOT"], "", __DIR__);
    $base = str_replace("/resources", "", $base);
    return $base.$resource;
}
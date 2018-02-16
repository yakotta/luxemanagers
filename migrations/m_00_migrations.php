<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) || 
    $_SESSION["authenticated"] == false) 
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

// here is the query which creates the migrations table
$migrations=<<<QUERY
    create table if not exists migrations (
        filename varchar(255),
        primary key (filename)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($migrations);

// this migrations keeps track of the migrations that have been run

return true;
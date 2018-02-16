<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) || 
    $_SESSION["authenticated"] == false) 
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$services=<<<QUERY
    create table if not exists services (
        id int not null auto_increment primary key,
        name varchar(255),
        short_description varchar(255),
        full_description longtext,
        image varchar(255),
        link varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($services);

return true;
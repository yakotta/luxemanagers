<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = connect();

$press=<<<QUERY
    create table if not exists press (
        id int not null auto_increment primary key,
        publication varchar(255),
        content longtext,
        urlname varchar(255),
        marketing_image varchar(255),
        publication_image varchar(255),
        link varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($press);

return true;
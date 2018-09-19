<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$users=<<<QUERY
    create table if not exists users (
        id int not null auto_increment primary key,
        username varchar(255),
        password varchar(255),
        email varchar(255),
        is_enabled tinyint(1) default 1,
        unique(username)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($users);

return true;
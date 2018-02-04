<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = connect();

$uploads=<<<QUERY
    create table if not exists resumes (
        id int not null auto_increment primary key,
        name varchar(255),
        email varchar(255),
        phone varchar(255),
        filename varchar(255),
        message text
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($uploads);

return true;
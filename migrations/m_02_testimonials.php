<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = connect();

$testimonials=<<<QUERY
    create table if not exists testimonials (
        id int not null auto_increment primary key,
        name varchar(255),
        quote text,
        title text,
        link varchar(255),
        image varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($testimonials);

return true;
<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = connect();

$site_config=<<<QUERY
    create table if not exists site_config (
        id int not null auto_increment primary key,
        field varchar(255),
        value varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($site_config);

return true;
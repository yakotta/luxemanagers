<?php
if( !is_array($_SESSION) || 
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$contact_form=<<<QUERY
    alter table contact_form
        modify column name varchar(255) not null,
        modify column email varchar(255) not null,
        modify column preference varchar(255) not null default "email",
        modify column message text not null
QUERY;

$db->query($contact_form);

return true;
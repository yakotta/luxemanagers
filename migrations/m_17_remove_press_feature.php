<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$db->query("alter table press drop featured");

return true;
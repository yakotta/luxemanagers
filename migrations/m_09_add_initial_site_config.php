<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = connect();

$db->query("truncate site_config");
$db->query("insert into site_config set field='phone', value='1-650-385-8989'");
$db->query("insert into site_config set field='email', value='contact@luxemanagers.com'");

return true;
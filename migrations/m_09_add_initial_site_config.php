<?php
$db->query("truncate site_config");
$db->query("insert into site_config set field='phone', value='1-650-385-8989'");
$db->query("insert into site_config set field='email', value='contact@luxemanagers.com'");

return true;
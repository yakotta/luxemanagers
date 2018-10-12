<?php
$db->query("alter table press add featured tinyint(1) default 0");

return true;
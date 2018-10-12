<?php
$db = Database::connect();

$site_config=<<<QUERY
    create table if not exists site_config (
        id int not null auto_increment primary key,
        field varchar(255),
        value varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($site_config);

return true;
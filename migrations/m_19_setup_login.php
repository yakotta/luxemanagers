<?php
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
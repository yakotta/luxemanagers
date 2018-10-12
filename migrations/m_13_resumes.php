<?php
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
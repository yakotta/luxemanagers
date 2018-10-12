<?php
$services=<<<QUERY
    create table if not exists services (
        id int not null auto_increment primary key,
        name varchar(255),
        short_description varchar(255),
        full_description longtext,
        image varchar(255),
        link varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($services);

return true;
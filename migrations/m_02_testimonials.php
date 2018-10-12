<?php
$db = Database::connect();

$testimonials=<<<QUERY
    create table if not exists testimonials (
        id int not null auto_increment primary key,
        name varchar(255),
        quote text,
        title text,
        link varchar(255),
        image varchar(255)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($testimonials);

return true;
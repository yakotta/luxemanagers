<?php
$db = Database::connect();

$contact_form=<<<QUERY
    create table if not exists contact_form (
        id int not null auto_increment primary key,
        name varchar(255),
        email varchar(255),
        phone varchar(255),
        preference varchar(255),
        message text
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($contact_form);

return true;
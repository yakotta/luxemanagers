<?php
$contact_form=<<<QUERY
    alter table contact_form
        modify column name varchar(255) not null,
        modify column email varchar(255) not null,
        modify column preference varchar(255) not null default "email",
        modify column message text not null
QUERY;

$db->query($contact_form);

return true;
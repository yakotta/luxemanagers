<?php
// here is the query which creates the migrations table
$migrations=<<<QUERY
    create table if not exists migrations (
        filename varchar(255),
        primary key (filename)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($migrations);

// this migrations keeps track of the migrations that have been run

return true;
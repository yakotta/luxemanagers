<?php

function insertContact($name, $email, $phone, $preference, $message) 
{
$query=<<<QUERY
    insert into contact_form set
        name = "$name",
        email = "$email",
        phone = "$phone",
        preference = "$preference",
        message = "$message"
QUERY;

    $db = connect();
    $result = $db->query($query);
    $last_id = $db->insert_id;

    if ($result === true) {
        return $last_id;
    } else {
        $error = $db->error;
        die("Error inserting message into the database: ".$error);
        return $result;
    }
}
<?php

function insertContact($message) 
{
$query=<<<QUERY
    insert into contact_form set
        name = "{$message["name"]},
        email = "{$message["email"]},
        phone = "{$message["phone"]},
        preference = "{$message["preference"]},
        message = "{$message["message"]}
QUERY;

    $db = connect();
    $result = $db->query($query);
    $last_id = $db->insert_id;
    
    if ($result === true) {
        return $last_id;
    } else {
        return $result;
    }
}
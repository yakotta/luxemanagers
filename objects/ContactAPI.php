<?php

class ContactAPI {
    static public function insertContact($name, $email, $phone, $preference, $message)
    {
        // insert contact form query
$query=<<<QUERY
    insert into contact_form set
        name = :name,
        email = :email,
        phone = :phone,
        preference = :preference,
        message = :message
QUERY;
    
        $db = Database::connect();
        
        $statement = $db->prepare($query);
        // the execute function runs the query
        $statement->execute([
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone,
            ":preference" => $preference,
            ":message" => $message
        ]);
        
        return $db->lastInsertId();
    }

    static public function getMessageList() {
        $db = Database::connect();
        return $db->query("select * from contact_form");
    }

    static public function getRecentMessagesList() {
        $db = Database::connect();
        return $db->query("select * from contact_form order by id desc limit 3");
    }
}
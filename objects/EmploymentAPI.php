<?php

class EmploymentAPI {
    static public function insertResume($name, $email, $phone, $filename, $message)
    {
$query=<<<QUERY
    insert into resumes set
        name = :name,
        email = :email,
        phone = :phone,
        filename = :filename,
        message = :message
QUERY;

        $db = Database::connect();
        $statement = $db->prepare($query);
        $statement->execute([
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone,
            ":filename" => $filename,
            ":message" => $message
        ]);
        
        return $db->lastInsertId();
    }

    static public function getResumeList(){
        $db = Database::connect();
        return $db->query("select * from resumes");
    }
}
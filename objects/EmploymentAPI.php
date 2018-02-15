<?php

class EmploymentAPI {
    static public function insertResume($name, $email, $phone, $filename, $message)
    {
$query=<<<QUERY
    insert into resumes set
        name = "$name",
        email = "$email",
        phone = "$phone",
        filename = "$filename",
        message = "$message"
QUERY;

        // return a database connection
        $db = connect();
        
        // $result will say whether the query executed ok or not
        $result = $db->query($query);
        
        // $last_id will say what the number of the row in the database was added
        $last_id = $db->insert_id;
        
        // test whether $result was successful or not
        if ($result === true) {
            // if it was successful, return the number of the row which was inserted
            return $last_id;
        } else {
            // if it was not successful, return the value of $result
            return $result;
        }
    }
}
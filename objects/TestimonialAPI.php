<?php
class TestimonialAPI {
    static public function getTestimonialList()
    {
        $db = Database::connect();
        $result = $db->query("select * from testimonials");
        return $result;
    }
    
    static public function insertTestimonial($name, $title, $quote, $link, $filename="") 
    {
$query=<<<QUERY
    insert into testimonials set
        name = "$name",
        title = "$title",
        quote = "$quote",
        link = "$link",
        image = "$filename"
QUERY;

        $db = Database::connect();
        $result = $db->query($query);
        $last_id = $db->insert_id;
        
        if ($result === true) {
            return $last_id;
        } else {
            return $result;
        }
    }
    
    static public function editTestimonial($id, $name, $title, $quote, $link, $filename="") 
    {
$query=<<<QUERY
    update testimonials set
        name = "$name",
        title = "$title",
        quote = "$quote",
        link = "$link",
        image = "$filename"
        
    where id = "$id"
QUERY;

        $db = Database::connect();
        return $db->query($query);
    }
    
    static public function deleteTestimonial($id) 
    {
        $db = Database::connect();
        return $db->query("delete from testimonials where id='$id'");
    }
    
    static public function setTestimonialImage($id, $filename)
    {
        $db = Database::connect();
        return $db->query("update testimonials set image='$filename' where id='$id'");
    }
}
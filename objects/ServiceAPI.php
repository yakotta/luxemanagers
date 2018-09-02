<?php
class ServiceAPI
{
    static public function getServiceByID($id) {
        $db = Database::connect();
        $statement = $db->query("select * from services where id = '$id'");
        return $statement->fetch();
    }
    
    static public function getServiceByLink($link) {
        $db = Database::connect();
        $statement = $db->query("select * from services where link = '$link'");
        return $statement->fetch();
    }
    
    static public function getServiceList() {
        $db = Database::connect();
        return $db->query("select * from services");
    }
    
    static public function insertService($name, $short_description, $full_description, $image, $link) 
    {
$query=<<<QUERY
    insert into services set
        name = :name,
        short_description = :short_description,
        full_description = :full_description,
        image = :image,
        link = :link
QUERY;

        $db = Database::connect();
        $statement = $db->prepare($query);
        $statement->execute([
           ":name" => $name,
           ":short_description" => $short_description,
           ":full_description" => $full_description,
           ":image" => $image,
           ":link" => $link,
        ]);
        return $db->lastInsertId();
    }
    
    static public function editService($id) 
    {
$query=<<<QUERY
    update services set
        name = :name,
        short_description = :short_description,
        full_description = :full_description,
        image = :image,
        link = :link
        
    where id = :id
QUERY;

        $db = Database::connect();
        $statement = $db->prepare($query);
        return $statement->execute([
            ":name" => $name,
            ":short_description" => $short_description,
            ":full_description" => $full_description,
            ":image" => $image,
            ":link" => $link,
        ]);
    }
    
    static public function deleteService($id) {
        $db = Database::connect();
        $statement = $db->prepare("delete from services where id = :id");
        $statement->execute([":id" => $id]);
        
        return $statement->rowCount();
    }
}
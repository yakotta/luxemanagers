<?php
class ServiceAPI {
    static public function insertService($datasource) 
    {
$query=<<<QUERY
    insert into services set
        name = "{$datasource["name"]}",
        short_description = "{$datasource["short_description"]}",
        full_description = "{$datasource["full_description"]}",
        image = "{$datasource["image"]}",
        link = "{$datasource["link"]}"
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
    
    static public function editService($datasource) 
    {
$query=<<<QUERY
    update services set
        name = "{$datasource["name"]}",
        short_description = "{$datasource["short_description"]}",
        full_description = "{$datasource["full_description"]}",
        image = "{$datasource["image"]}",
        link = "{$datasource["link"]}"
        
    where id = "{$datasource["id"]}"
QUERY;

        $db = Database::connect();
        return $db->query($query);
    }
    
    static public function deleteService($datasource) 
    {
        $db = Database::connect();
        return $db->query("delete from services where id='{$datasource["id"]}'");
    }
    
    static public function getServiceByID($datasource)
    {
        $db = Database::connect();
        $result = $db->query("select * from services where id='{$datasource["id"]}'");
        $service = $result->fetch_assoc();
        return $service;
    }
    
    static public function getServiceByLink($link)
    {
        $db = Database::connect();
        $result = $db->query("select * from services where link='$link'");
        $service = $result->fetch_assoc();
        return $service;
    }
    
    static public function getServiceList()
    {
        $db = Database::connect();
        $result = $db->query("select * from services");
        return $result;
    }
}
<?php
function insertService($datasource) 
{
$query=<<<QUERY
    insert into services set
        name = "{$datasource["name"]},
        short_description = "{$datasource["short_description"]},
        full_description = "{$datasource["full_description"]},
        image = "{$datasource["image"]},
        link = "{$datasource["link"]}
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

function editService($datasource) 
{
$query=<<<QUERY
    update services set
        name = "{$datasource["name"]},
        short_description = "{$datasource["short_description"]},
        full_description = "{$datasource["full_description"]},
        image = "{$datasource["image"]},
        link = "{$datasource["link"]}
        
    where id = "{$datasource["id"]}"
QUERY;

    $db = connect();
    return $db->query($query);
}

function deleteService($datasource) 
{
    $db = connect();
    return $db->query("delete from services where id='{$datasource["id"]}'");
}

function getServiceByID($datasource)
{
    $db = connect();
    $result = $db->query("select * from services where id='{$datasource["id"]}'");
    $service = $result->fetch_assoc();
    return $service;
}

function getServiceByLink($link)
{
    $db = connect();
    $result = $db->query("select * from services where link='$link'");
    $service = $result->fetch_assoc();
    return $service;
}

function getServiceList()
{
    $db = connect();
    $result = $db->query("select * from services");
    return $result;
}
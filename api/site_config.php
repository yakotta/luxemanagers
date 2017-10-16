<?php

function getSiteConfig($field)
{
    $db = connect();
    $result = $db->query("select * from site_config where field='$field'");
    $row = $result->fetch_assoc();
    
    if($result === NULL || $row === NULL){
        throw new Exception(__FUNCTION__.": $field not found in site_config database");
    }

    return $row["value"];
}
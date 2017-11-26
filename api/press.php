<?php
function getPressList()
{
    $db = connect();
    $result = $db->query("select * from press");
    return $result;
}
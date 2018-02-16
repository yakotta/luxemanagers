<?php
class SiteConfig {
    static public function getSiteConfig($field)
    {
        $db = Database::connect();
        $result = $db->query("select value from site_config where field='$field'");
    
        if($result && $result->num_rows){
            $row = $result->fetch_assoc();
            return $row["value"];
        }
    
        throw new Exception(__FUNCTION__.": $field not found in site_config database");
    }
}
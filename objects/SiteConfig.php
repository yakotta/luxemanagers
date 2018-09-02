<?php
class SiteConfig {
    static public function getSiteConfig($field) {
        $db = Database::connect();
        $statement = $db->prepare("select value from site_config where field = :field");
        $statement->execute([":field" => $field]);
        
        return $statement->fetchColumn();
    }
}
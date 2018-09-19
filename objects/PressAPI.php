<?php
class PressAPI {
    static public function getPressList() {
        $db = Database::connect();
        return $db->query("select * from press order by id desc");
    }
    
    static public function getFeaturedPressList() {
        $db = Database::connect();
        return $db->query("select * from press order by id desc limit 2");
    }

    static public function getPressByURLname($urlname) {
        $db = Database::connect();
        $statement = $db->query("select * from press where urlname = '$urlname'");
        return $statement->fetch();
    }

    static public function getPressByID($id) {
        $db = Database::connect();
        $statement = $db->query("select * from press where id = '$id'");
        return $statement->fetch();
    }

    static public function getPressByLink($link) {
        $db = Database::connect();
        $statement = $db->query("select * from press where link = '$link'");
        return $statement->fetch();
    }

    static public function insertPress($publication, $content, $urlname, $primary_image, $secondary_image, $link)
    {
$query=<<<QUERY
        insert into press set
            publication = :publication,
            content = :content,
            urlname = :urlname,
            primary_image = :primary_image,
            secondary_image = :seconadry_image,
            link = :link
QUERY;

        $db = Database::connect();
        $statement = $db->prepare($query);
        $statement->execute([
            ":publication" => $publication,
            ":content" => $content,
            ":urlname" => $urlname,
            ":primary_image" => $primary_image,
            ":secondary_image" => $secondary_image,
            ":link" => $link,
        ]);
        return $db->lastInsertId();
    }

    static public function editPress($id)
    {
$query=<<<QUERY
        update press set
            publication = :publication,
            content = :content,
            urlname = :urlname,
            primary_image = :primary_image,
            secondary_image = :seconadry_image,
            link = :link
        
            where id = :id
QUERY;

        $db = Database::connect();
        $statement = $db->prepare($query);
        return $statement->execute([
            ":publication" => $publication,
            ":content" => $content,
            ":urlname" => $urlname,
            ":primary_image" => $primary_image,
            ":secondary_image" => $secondary_image,
            ":link" => $link,
        ]);
    }

    static public function deletePress($id) {
        $db = Database::connect();
        $statement = $db->prepare("delete from press where id = :id");
        $statement->execute([":id" => $id]);

        return $statement->rowCount();
    }
}
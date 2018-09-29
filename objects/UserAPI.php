<?php
class UserAPI {
    static public function verifyLogIn($username, $password) {
        $db = Database::connect();
        $statement = $db->prepare("select id, password from users where username = :username");
        $statement->execute([
            ":username" => $username,
        ]);
        if($statement->rowCount() > 0) {
            $user = $statement->fetch();
            if(password_verify($password, $user['password'])){
                return $user['id'];
            }
        }
        
        return false;
    }

    static public function getUserById($id) {
        $db = Database::connect();
        $statement = $db->prepare("select id, username, email, is_enabled from users where id = :id");
        $statement->execute([
            ":id" => $id,
        ]);
        if($statement->rowCount() > 0) {
            $user = $statement->fetch();
            return $user;
        }
        
        return false;
    }

    static public function computePassword($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    }

    static public function getUserList() {
        $db = Database::connect();
        return $db->query("select id, username, email, is_enabled from users");
    }
}
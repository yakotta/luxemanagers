<?php
class UserAPI {
    static public function verifyLogIn($username, $password) {
        $db = Database::connect();
        $statement = $db->query("select password from users where username = '$username'");
        $user = $statement->fetch();

        if(password_verify($password, $user['password'])){
            return true;
        }
        
        return false;
    }

    static public function computePassword($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    }
}
<?php
class UserAPI {
    static public function verifyLogIn($username, $password) {
        $db = Database::connect();
        $statement = $db->query("select password from users where username = '$username'");
        $user = $statement->fetch();

        if($user['password'] === $password) {
            return true;
        }

        return false;
    }
}
<?php
class AuthenticationAPI {
    static public function setLogInState($userid, $url_failure='/login?error=invalid') {
        if($userid !== false) {
            $_SESSION['login'] = $userid;
            Route::redirect('/admin');
        } else {
            $_SESSION['login'] = false;
            session_destroy();
            Route::redirect($url_failure);
        }
    }

    static public function isLoggedIn() {
        // array not empty, array key login exists, array key login is true
        if(!empty($_SESSION) && array_key_exists('login', $_SESSION) && $_SESSION['login'] !== false) {
            return $_SESSION['login'];
        }
        return false;
    }
}
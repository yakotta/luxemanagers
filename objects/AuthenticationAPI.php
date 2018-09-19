<?php
class AuthenticationAPI {
    static public function setLogInState($status, $url_failure='/login?error=invalid') {
        if($status === true) {
            $_SESSION['login'] = true;
            Route::redirect('/admin');
        } else {
            $_SESSION['login'] = false;
            session_destroy();
            Route::redirect($url_failure);
        }
    }

    static public function isLoggedIn() {
        // array not empty, array key login exists, array key login is true
        if(!empty($_SESSION) && array_key_exists('login', $_SESSION) && $_SESSION['login'] === true) {
            return true;
        }
        return false;
    }
}
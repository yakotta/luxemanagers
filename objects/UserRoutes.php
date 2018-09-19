<?php
class UserRoutes {
    // Log In Page
    static public function userLogInPage() {
        $status = AuthenticationAPI::isLoggedIn();
        if($status === true)Route::redirect("/admin");
        Render::page("content_login.php");
    }

    // Log In API
    static public function apiLogIn() {
        $status = Validate::parameters($_POST, [
            "username" => ["required" => true, "type" => "string"],
            "password" => ["required" => true, "type" => "string"]
        ]);

        if($status === true) {
            $user = UserAPI::verifyLogIn(
                $_POST["username"], 
                $_POST["password"]
            );

            AuthenticationAPI::setLogInState($user);
        } else {
            error_log("Incomplete login fields.");
            Route::redirect("/login?validation=failed");
        }
    }

    // Log Out API   
    static public function apiLogOut() {
        AuthenticationAPI::setLogInState(false, '/');
    } 
}
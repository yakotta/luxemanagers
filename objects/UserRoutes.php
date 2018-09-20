<?php
class UserRoutes {
    // Log In Page
    static public function userLogInPage() {
        $userid = AuthenticationAPI::isLoggedIn();
        if($userid !== false) Route::redirect("/admin");
        Render::admin_page("block_login.php");
    }

    // Log In API
    static public function apiLogIn() {
        $status = Validate::parameters($_POST, [
            "username" => ["required" => true, "type" => "string"],
            "password" => ["required" => true, "type" => "string"]
        ]);

        if($status === true) {
            $userid = UserAPI::verifyLogIn(
                $_POST["username"], 
                $_POST["password"]
            );

            AuthenticationAPI::setLogInState($userid);
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
<?php
class AdminRoutes {
    // Admin Home Page
    static public function adminHomePage() {
        $userid = AuthenticationAPI::isLoggedIn();
        if($userid === false) Route::redirect("/login");
        $user = UserAPI::getUserById($userid);
        Render::admin_page("admin_home.php", [
            "user" => $user,
        ]);
    }
    
    // Run Migrations
    static public function adminRunMigrations() {
        ob_start();
        $migrations = glob(__DIR__."/../migrations/m*.php");
    
        print("<style type='text/css'>.green {color: green}</style>");
        
        foreach($migrations as $m){
            if(Migrations::check($m) === false){
                print("<b>Running Migration: $m</b><br/>");
    
                $output = include($m);
                if($output === true) {
                    print("<b class='green'>Adding Migration: $m</b><br/>");
                    Migrations::add($m);
                }
            } else {
                print("Skipping Migration $m<br/>");
            }
        }
    
        print("<b>Finished migrating everything</b><br/>");
        print("<a href='/'>Go back to the home page</a>");
    
        Render::page(ob_get_clean());
    }
}
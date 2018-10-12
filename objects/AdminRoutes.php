<?php
class AdminRoutes {
    // Admin Home Page
    static public function adminHomePage() {
        $userid = AuthenticationAPI::isLoggedIn();
        if($userid === false) Route::redirect("/login");
        $user = UserAPI::getUserById($userid);
        $userList = UserAPI::getUserList();
        $messageList = ContactAPI::getRecentMessagesList();
        $resumeList = EmploymentAPI::getRecentResumeList();
        Render::admin_page("admin_home.php", [
            "user" => $user,
            "userList" => $userList,
            "messageList" => $messageList,
            "resumeList" => $resumeList,
        ]);
    }
    
    // Run Migrations
    static public function adminRunMigrations() {
        $userid = AuthenticationAPI::isLoggedIn();
        if($userid === false) Route::redirect("/login");
        
        ob_start();
        $migrations = glob(__DIR__."/../migrations/m*.php");
    
        print("<style type='text/css'>.green {color: green}</style>");
        
        foreach($migrations as $m){
            if(Migrations::check($m) === false){
                print("<b>Running Migration: $m</b><br/>");
    
                $db = Database::connect();
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
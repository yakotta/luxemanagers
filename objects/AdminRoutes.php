<?php
class AdminRoutes {
    // Run Migrations
    static public function adminRunMigrations(){
        ob_start();
        $migrations = glob(__DIR__."/../migrations/m*.php");
    
        print("<style type='text/css'>.green {color: green}</style>");
        
        foreach($migrations as $m){
            if(check_migration($m) === false){
                print("<b>Running Migration: $m</b><br/>");
    
                $output = include($m);
                if($output === true) {
                    print("<b class='green'>Adding Migration: $m</b><br/>");
                    add_migration($m);
                }
            } else {
                print("Skipping Migration $m<br/>");
            }
        }
    
        print("<b>Finished migrating everything</b><br/>");
        print("<a href='/'>Go back to the home page</a>");
    
        render_page(ob_get_clean());
    }
}
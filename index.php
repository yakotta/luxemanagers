<?php
include(__DIR__."/resources/library.php");

session_start();
// Just authenticate everybody for now until we create creating a proper login
$_SESSION["authenticated"] = true;    

$url = $_GET["url"];

switch($url) {
    case "":
        $template = render_template(__DIR__."/templates/content_home.php");
        break;
        
    case "about":
        $template = render_template(__DIR__."/templates/content_about.php");
        break;
    
    case "services":
        $template = render_template(__DIR__."/templates/content_services.php");
        break;
        
    case "migrations":
        ob_start();
        $migrations = glob(__DIR__."/migrations/m*.php");

        foreach($migrations as $m){
            if(check_migration($m) === false){
                print("Running Migration: $m<br/>");
                
                $output = include($m);
                if($output === true) {
                    print("Adding Migration: $m<br/>");
                    add_migration($m);
                }
            } else {
                print("Skipping Migration $m<br/>");
            }
        }
        
        print("<b>Finished migrating everything</b><br/>");
        print("<a href='/'>Go back to the home page</a>");
        
        $template = ob_get_clean();
        break;
        
    default:
        $template = render_template(__DIR__."/templates/error_404.php");
        break;
}

print(render_template(__DIR__."/templates/page_skeleton.php", ["content" => $template]));
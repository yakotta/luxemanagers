<?php
error_reporting(-1);
ini_set("display_errors", true);

include(__DIR__."/resources/library.php");
include(__DIR__."/api/site_config.php");

session_start();
// Just authenticate everybody for now until we create a proper login
$_SESSION["authenticated"] = true;

$url = $_GET["url"];

switch(true) {
// Home Page 
    case preg_match("~^(|/)$~", $url):
        include(__DIR__."/api/services.php");
        include(__DIR__."/api/testimonials.php");
        include(__DIR__."/api/press.php");

        $serviceList = getServiceList();
        $testimonialList = getTestimonialList();
        $pressList = getPressList();

        $template = render_template(__DIR__."/templates/content_home.php", [
            "testimonialList" => $testimonialList,
            "serviceList" => $serviceList,
            "pressList" => $pressList,
        ]);
        break;

// Content Pages        
    case preg_match("~about~", $url):
        $template = render_template(__DIR__."/templates/content_about.php");
        break;

// Service Details Pages
    case preg_match("~^[/]?services$~", $url):
        include(__DIR__."/api/services.php");
        $serviceList = getServiceList();
        $template = render_template(__DIR__."/templates/services/content_services.php", [
            "serviceList" => $serviceList
        ]);
        break;

    case preg_match("~services/(.*)~", $url ,$matches):
        include(__DIR__."/api/services.php");
        $service = getServiceByLink($matches[1]);
        $template = render_template(__DIR__."/templates/services/display_service.php", [
            "service" => $service
        ]);

        // TODO: this code will break and not display correct page if you do not put a service that exists
        break;

// Service Management Pages
    case preg_match("~admin/services/add~", $url):
        $template = render_template(__DIR__."/templates/services/add_service.php");
        break;
    
    case preg_match("~admin/services/list~", $url):
        // contains edit and delete
        include_once("api/services.php");
        $serviceList = getServiceList();
        $serviceCount = $serviceList->num_rows;
        $template = render_template(__DIR__."/templates/services/list_service.php", [
            "serviceList" => $serviceList,
            "serviceCount" => $serviceCount
        ]);
        break;

    case preg_match("~admin/services/details~", $url):
        die($url);
        include_once("api/services.php");
        $id = $_GET["id"];

        if(empty($id)) {
            redirect("/404");
        }

        $service = getServiceByID($id);  
        
        if ($service === NULL) {
            redirect("/404");
        }

        $template = render_template(__DIR__."templates/services/service_detail.php", [
            "service" => $service
        ]);
        break;
        
// API Routes
    case preg_match("~api/send-message~", $url):
        var_dump_pre($_POST);
        die("x.x");
        break;

    case preg_match("~api/services/add~", $url):
        include_once("api/services.php");
        $status = check_parameters($_POST, [
            "name", "full_description"
        ]);
        if($status === true) {
            insertService($_POST);
            redirect("/services/list");
        } else {
            error_log("Failed to create service.");
            redirect("/services/add?error=$status");
        }
        break;

    case preg_match("~api/services/edit~", $url):
        include_once("api/services.php");
        $status = check_parameters($_POST, [
            "id", "name", "full_description", "image"
        ]);
        if($status === true) {
            editService($_POST);
            redirect("/services/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit service details.");
            redirect("/services/details?error=$status");
        }
        break;

    case preg_match("~api/services/delete~", $url):
        include_once("api/services.php");
        $status = check_parameters($_GET, [
            "id" => [
                "required" => true,
                "type" => "integer",
            ]
        ]);

        if($status === true) {
            deleteService($_GET);
            redirect("/services/list");
        } else {
            error_log("Failed to delete service.");
            redirect("/services/details?error=$status");
        }
        break;

// Migrations
    case preg_match("~migrations~", $url):
        ob_start();
        $migrations = glob(__DIR__."/migrations/m*.php");

        print("<style type='text/css'>.green {color: green;}</style>");

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
        
        $template = ob_get_clean();
        break;
        
    default:
        $template = render_template(__DIR__."/templates/error_404.php");
        break;
}

print(render_template(__DIR__."/templates/page_skeleton.php", ["content" => $template]));
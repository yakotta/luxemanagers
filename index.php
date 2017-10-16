<?php
include(__DIR__."/resources/library.php");

session_start();
// Just authenticate everybody for now until we create a proper login
$_SESSION["authenticated"] = true;    

$url = $_GET["url"];

switch($url) {
// Home Page 
    case "":
        include(__DIR__."/api/services.php");
        $serviceList = getServiceList();
        $template = render_template(__DIR__."/templates/content_home.php", [
            "serviceList" => $serviceList
        ]);
        break;

// Content Pages        
    case "about":
        $template = render_template(__DIR__."/templates/content_about.php");
        break;
    
    case "services":
        $template = render_template(__DIR__."/templates/services/content_services.php");
        break;

// Service Management Pages
    case "admin/services/add":
        $template = render_template(__DIR__."/templates/services/add_service.php");
        break;
    
    case "admin/services/list":
        // contains edit and delete
        include_once("api/services.php");
        $serviceList = getServiceList();
        $serviceCount = $serviceList->num_rows;
        $template = render_template(__DIR__."/templates/services/list_service.php", [
            "serviceList" => $serviceList,
            "serviceCount" => $serviceCount
        ]);
        break;
    
    case "admin/services/details":
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
        
// API Service Routes
    case "api/services/add":
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

    case "api/services/edit":
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

    case "api/services/delete":
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
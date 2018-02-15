<?php
// https://luxe-managers-yakotta.c9users.io/phpmyadmin
error_reporting(-1);
ini_set("display_errors", true);

include(__DIR__."/resources/library.php");

session_start();
// Just authenticate everybody for now until we create a proper login
$_SESSION["authenticated"] = true;

spl_autoload_register(function($className){
    $filename = str_replace("//","/","objects/$className.php");
    
    require_once($filename);
});

// Home Page
match_route("/", "GeneralRoutes::webHomePage");

// General Pages
match_route("/about", "GeneralRoutes::webAboutPage");
match_route("/press", "PressRoutes::webPressPage");

// Contact Pages
match_route("/contact", "ContactRoutes::webContactPage");
match_route("/api/send-message", "ContactRoutes::apiSendMessage");

// Employment Page
match_route("/employment", "EmploymentRoutes::webEmploymentPage");
match_route("/api/send-resume", "EmploymentRoutes::apiSendResume");

// Services Pages
match_route("/services", "ServiceRoutes::webServiceList");
match_route("/services/:service", "ServiceRoutes::webServiceDetails");
match_route("/admin/services/add", "ServiceRoutes::adminServiceAdd");
match_route("/admin/services/list", "ServiceRoutes::adminServiceList");
match_route("/admin/services/details", "ServiceRoutes::adminServiceDetails");
match_route("/api/services/add", "ServiceRoutes::apiServiceAdd");
match_route("/api/services/edit", "ServiceRoutes::apiServiceEdit");
match_route("/api/services/delete", "ServiceRoutes::apiServiceDelete");

// Migrations Pages
match_route("/admin/migrations", "AdminRoutes::adminRunMigrations");

// Default Route (404)
render_page("error_404.php");
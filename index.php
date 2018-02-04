<?php
// https://luxe-managers-yakotta.c9users.io/phpmyadmin
error_reporting(-1);
ini_set("display_errors", true);

include(__DIR__."/resources/library.php");
include(__DIR__."/api/site_config.php");

session_start();
// Just authenticate everybody for now until we create a proper login
$_SESSION["authenticated"] = true;

function render_page($template,$params=[]){
    $file = __DIR__."/templates/$template";

    if(is_file($file)){
        $template = render_template($file,$params);
    }

    die(render_template(__DIR__."/templates/page_skeleton.php", [
        "content" => $template
    ]));
}

// Home Page
match_route("/",function(){
    include(__DIR__."/api/services.php");
    include(__DIR__."/api/testimonials.php");
    include(__DIR__."/api/press.php");

    $serviceList = getServiceList();
    $testimonialList = getTestimonialList();
    $featuredPressList = getFeaturedPressList();

    render_page("content_home.php",[
        "testimonialList" => $testimonialList,
        "serviceList" => $serviceList,
        "featuredPressList" => $featuredPressList
    ]);
});

// Content Pages
match_route("/about",function(){
    render_page("content_about.php");
});

match_route("/contact",function(){
    render_page("content_contact.php");
});

match_route("/press", function(){
    include(__DIR__."/api/press.php");
    
    $pressList = getPressList();

    render_page("content_press.php", [
        "pressList" => $pressList,
    ]);
});

match_route("/employment", function() {
    render_page("content_employment.php");
});

// Service Details Pages
match_route("/services",function(){
    include(__DIR__."/api/services.php");
    $serviceList = getServiceList();

    render_page("content_service_list.php", [
        "serviceList" => $serviceList
    ]);
});

match_route("/services/:service",function($params){
    include(__DIR__."/api/services.php");
    $service = getServiceByLink($params["service"]);

    render_page("content_service_item.php", [
        "service" => $service
    ]);

    // TODO: this code will break and not display correct page if you do not put a service that exists
});

// Service Management Pages
match_route("/admin/services/add",function(){
    render_page("form_add_service.php");
});

match_route("/admin/services/list",function(){
    // contains edit and delete
    include_once("api/services.php");
    $serviceList = getServiceList();
    $serviceCount = $serviceList->num_rows;

    render_page("content_service_list.php", [
        "serviceList" => $serviceList,
        "serviceCount" => $serviceCount
    ]);
});

match_route("/admin/services/details",function($params,$url){
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

    render_page("content_service_item.php", [
        "service" => $service
    ]);
});

// API Routes
match_route("/api/send-message",function(){
    // Make sure the fields are filled out and file is uploaded
    include_once("api/contact_form.php");
    $status_sent = "fail";
    $status_fields = check_parameters($_POST, [
        "name" => ["required" => true, "type" => "string"],
        "email" => ["required" => true, "type" => "email"],
        "phone" => ["required" => false, "type" => "phone"],
        "preference" => ["required" => true, "type" => "string"],
        "message" =>["required" => true, "type" => "string"]
    ]);
    
    if($status_fields === true) {
        insertContact($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["preference"], $_POST["message"]);
        // function for sending the email goes here
        send_email(); // TODO: finish the email function
        $status_sent = "success";
    }
    
    // TODO: We need to redirect back to the home page or contact page accordingly
    redirect("/contact?status=$status_sent");
});

match_route("/api/send-resume",function(){
    // Make sure the fields are filled out and file is uploaded
    include_once("api/resumes.php");
    $status_upload = "fail";
    $status_fields = check_parameters($_POST, [
        "name" => ["required" => true, "type" => "string"], 
        "email" => ["required" => true, "type" => "email"], 
        "phone" => ["required" => false, "type" => "phone"]
    ]);
    $status_files = check_parameters($_FILES, [
        "resume" => ["required" => true, "type" => "doc, docx,pdf"]
    ]);
    
    if($status_fields === true && $status_files === true) {
        $filename = unique_filename(slugify($_POST["name"]) . "_" . $_FILES["resume"]["name"]);
        move_uploaded_file($_FILES['resume']['tmp_name'], __DIR__."/uploads/resumes/$filename");
        insertResume($_POST["name"], $_POST["email"], $_POST["phone"], $filename, $_POST["message"]);
        $status_upload = "success";
    }

    // redirect back to employment page
    redirect("/employment?status=$status_upload");
});

match_route("/api/services/add",function(){
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
});

match_route("/api/services/edit",function(){
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
});

match_route("/api/services/delete",function(){
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
});

// Migrations
match_route("/admin/migrations",function(){
    ob_start();
    $migrations = glob(__DIR__."/migrations/m*.php");

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
});

render_page("error_404.php");
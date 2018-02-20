<?php
// https://luxe-managers-yakotta.c9users.io/phpmyadmin
error_reporting(-1);
ini_set("display_errors", true);

session_start();
// Just authenticate everybody for now until we create a proper login
$_SESSION["authenticated"] = true;

spl_autoload_register(function($className){
    // First attempt to find the file inside the library
    $filename = str_replace("//","/","library/$className.php");
    // Test if the file exists, if so, go ahead and include it
    if(is_file($filename)) require_once($filename);
    
    // If you didnt find the file in the library, then try looking in the objects
    $filename = str_replace("//","/","objects/$className.php");
    // Test if the file exists, if so, go ahead and include it
    if(is_file($filename)) require_once($filename);
});

// Home Page
Route::match("/", "GeneralRoutes::webHomePage");

// Admin Pages
Route::match("/admin", "AdminRoutes::adminHomePage");

// General Pages
Route::match("/about", "GeneralRoutes::webAboutPage");

// Contact Pages
Route::match("/contact", "ContactRoutes::webContactPage");
Route::match("/api/send-message", "ContactRoutes::apiSendMessage");

// Employment Page
Route::match("/employment", "EmploymentRoutes::webEmploymentPage");
Route::match("/api/send-resume", "EmploymentRoutes::apiSendResume");

// Services Pages
Route::match("/services", "ServiceRoutes::webServiceList");
Route::match("/services/:service", "ServiceRoutes::webServiceDetails");
Route::match("/admin/services/add", "ServiceRoutes::adminServiceAdd");
Route::match("/admin/services/list", "ServiceRoutes::adminServiceList");
Route::match("/admin/services/details", "ServiceRoutes::adminServiceDetails");
Route::match("/api/services/add", "ServiceRoutes::apiServiceAdd");
Route::match("/api/services/edit", "ServiceRoutes::apiServiceEdit");
Route::match("/api/services/delete", "ServiceRoutes::apiServiceDelete");

// Press Pages
Route::match("/press", "PressRoutes::webPressPage");

// Testimonial Pages
Route::match("/admin/testimonials", "TestimonialRoutes::adminTestimonialList");
Route::match("/admin/testimonials/add", "TestimonialRoutes::adminTestimonialAdd");
Route::match("/admin/testimonials/edit", "TestimonialRoutes::adminTestimonialEdit");
Route::match("/api/testimonials/add", "TestimonialRoutes::apiTestimonialAdd");
Route::match("/api/testimonials/edit", "TestimonialRoutes::apiTestimonialEdit");
Route::match("/api/testimonials/delete/:id", "TestimonialRoutes::apiTestimonialDelete");

// Migrations Page
Route::match("/admin/migrations", "AdminRoutes::adminRunMigrations");

// Default Route (404)
Render::page("error_404.php");
<?php
// https://luxe-managers-yakotta.c9users.io/phpmyadmin
error_reporting(-1);
ini_set("display_errors", true);

session_start();

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

// Admin Home Page
Route::match("/admin", "AdminRoutes::adminHomePage");

// Log In Page
Route::match("/login", "UserRoutes::userLogInPage");
Route::match("/api/login", "UserRoutes::apiLogIn");
Route::match("/api/logout", "UserRoutes::apiLogOut");

// General Pages
Route::match("/about", "GeneralRoutes::webAboutPage");

// Contact Pages
Route::match("/contact", "ContactRoutes::webContactPage");
Route::match("/api/send-message", "ContactRoutes::apiSendMessage");
Route::match("/admin/messages", "ContactRoutes::adminContactPage");

// Employment Pages
Route::match("/employment", "EmploymentRoutes::webEmploymentPage");
Route::match("/api/send-resume", "EmploymentRoutes::apiSendResume");
Route::match("/admin/resumes", "EmploymentRoutes::adminResumeList");

// Services Pages
Route::match("/services", "ServiceRoutes::webServiceList");
Route::match("/services/:service", "ServiceRoutes::webServiceDetails");
Route::match("/admin/services", "ServiceRoutes::adminServiceList");
Route::match("/admin/services/add", "ServiceRoutes::adminServiceAdd");
Route::match("/api/services/add", "ServiceRoutes::apiServiceAdd");
Route::match("/api/services/delete", "ServiceRoutes::apiServiceDelete");

// Press Pages
Route::match("/press", "PressRoutes::webPressList");
Route::match("/press/:press", "PressRoutes::webPressDetails");
Route::match("/admin/press", "PressRoutes::adminPressList");
Route::match("/admin/press/add", "PressRoutes::adminPressAdd");
Route::match("/admin/press/list", "PressRoutes::adminPressList");
Route::match("/api/press/add", "PressRoutes::apiPressAdd");
Route::match("/api/press/delete", "PressRoutes::apiPressDelete");

// Testimonial Pages
Route::match("/admin/testimonials", "TestimonialRoutes::adminTestimonialList");
Route::match("/admin/testimonials/add", "TestimonialRoutes::adminTestimonialAdd");
Route::match("/api/testimonials/add", "TestimonialRoutes::apiTestimonialAdd");
Route::match("/api/testimonials/delete/:id", "TestimonialRoutes::apiTestimonialDelete");

// Migrations Page
Route::match("/admin/migrations", "AdminRoutes::adminRunMigrations");

// Default Route (404)
Render::page("error_404.php");
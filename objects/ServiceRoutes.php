<?php
class ServiceRoutes {
    // Service Page (public)
    static public function webServiceList(){
        $serviceList = ServiceAPI::getServiceList();

        Render::page("content_service_list.php", [
            "serviceList" => $serviceList
        ]);
    }
    
    // Service Detail Pages (public)
    static public function webServiceDetails($params){
        $service = ServiceAPI::getServiceByLink($params["service"]);
    
        Render::page("content_service_item.php", [
            "service" => $service
        ]);
    
        // TODO: this code will break and not display correct page if you do not put a service that exists
    }
    
    // Add Service Page (admin)
    static public function adminServiceAdd(){
        Render::page("form_add_service.php");
    }
    
    // Service List Page (admin)
    static public function adminServiceList(){
        // contains edit and delete
        $serviceList = ServiceAPI::getServiceList();
        $serviceCount = $serviceList->num_rows;
    
        Render::page("content_service_list.php", [
            "serviceList" => $serviceList,
            "serviceCount" => $serviceCount
        ]);
    }
    
    // Service Detail Page (admin)
    static public function adminServiceDetails($params,$url){
        die($url);
        $id = $_GET["id"];
    
        if(empty($id)) {
            Route::redirect("/404");
        }
    
        $service = ServiceAPI::getServiceByID($id);
    
        if ($service === NULL) {
            Route::redirect("/404");
        }
    
        Render::page("content_service_item.php", [
            "service" => $service
        ]);
    }
    
    //  Add Service API (functional)
    static public function apiServiceAdd()
    {
        $status = Validate::parameters($_POST, [
            "name" => ["required" => true, "type" => "string"],
            "short_description" => ["required" => false, "type" => "string"],
            "full_description" => ["required" => true, "type" => "string"],
            "image" => ["required" => false, "type" => "string"],
            "link" => ["required" => false, "type" => "string"]
        ]);
        
        if($status === true) {
            ServiceAPI::insertService(
                $_POST["name"], 
                $_POST["short_description"], 
                $_POST["full_description"],
                $_POST["image"],
                $_POST["link"]
            );
            Route::redirect("/services/list");
        } else {
            error_log("Failed to create service.");
            Route::redirect("/services/add?error=$status");
        }
    }
    
    // Edit Service API (functional)
    static public function apiServiceEdit()
    {
        $status = Validate::parameters($_POST, [
            "id" => ["required" => true, "type" => "integer"],
            "name" => ["required" => true, "type" => "string"],
            "short_description" => ["required" => false, "type" => "string"],
            "full_description" => ["required" => true, "type" => "string"],
            "image" => ["required" => false, "type" => "string"],
            "link" => ["required" => false, "type" => "string"]
        ]);
        
        if($status === true) {
            ServiceAPI::editService($_POST);
            Route::redirect("/services/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit service details.");
            Route::redirect("/services/details?error=$status");
        }
    }
    
    // Delete Service API (functional)
    static public function apiServiceDelete(){
        $status = Validate::parameters($_GET, [
            "id" => ["required" => true, "type" => "integer"]
        ]);
    
        if($status === true) {
            ServiceAPI::deleteService($_GET["id"]);
            Route::redirect("/services/list");
        } else {
            error_log("Failed to delete service.");
            Route::redirect("/services/details?error=$status");
        }
    }
}
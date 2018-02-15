<?php
class ServiceRoutes {
    // Service Page (public)
    static public function webServiceList(){
        $serviceList = ServiceAPI::getServiceList();
    
        render_page("content_service_list.php", [
            "serviceList" => $serviceList
        ]);
    }
    
    // Service Detail Pages (public)
    static public function webServiceDetails($params){
        $service = ServiceAPI::getServiceByLink($params["service"]);
    
        render_page("content_service_item.php", [
            "service" => $service
        ]);
    
        // TODO: this code will break and not display correct page if you do not put a service that exists
    }
    
    // Add Service Page (admin)
    static public function adminServiceAdd(){
        render_page("form_add_service.php");
    }
    
    // Service List Page (admin)
    static public function adminServiceList(){
        // contains edit and delete
        $serviceList = ServiceAPI::getServiceList();
        $serviceCount = $serviceList->num_rows;
    
        render_page("content_service_list.php", [
            "serviceList" => $serviceList,
            "serviceCount" => $serviceCount
        ]);
    }
    
    // Service Detail Page (admin)
    static public function adminServiceDetails($params,$url){
        die($url);
        $id = $_GET["id"];
    
        if(empty($id)) {
            redirect("/404");
        }
    
        $service = ServiceAPI::getServiceByID($id);
    
        if ($service === NULL) {
            redirect("/404");
        }
    
        render_page("content_service_item.php", [
            "service" => $service
        ]);
    }
    
    //  Add Service API (functional)
    static public function apiServiceAdd(){

        if($status === true) {
            ServiceAPI::insertService($_POST);
            redirect("/services/list");
        } else {
            error_log("Failed to create service.");
            redirect("/services/add?error=$status");
        }
    }
    
    // Edit Service API (functional)
    static public function apiServiceEdit(){
        $status = check_parameters($_POST, [
            "id" => ["required" => true, "type" => "integer"],
            "name" => ["required" => true, "type" => "string"],
            "short_description" => ["required" => false, "type" => "string"],
            "full_description" => ["required" => true, "type" => "string"],
            "image" => ["required" => false, "type" => "string"],
            "link" => ["required" => false, "type" => "string"]
        ]);
        
        if($status === true) {
            ServiceAPI::editService($_POST);
            redirect("/services/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit service details.");
            redirect("/services/details?error=$status");
        }
    }
    
    // Delete Service API (functional)
    static public function apiServiceDelete(){
        $status = check_parameters($_GET, [
            "id" => ["required" => true, "type" => "integer"]
        ]);
    
        if($status === true) {
            ServiceAPI::deleteService($_GET);
            redirect("/services/list");
        } else {
            error_log("Failed to delete service.");
            redirect("/services/details?error=$status");
        }
    }
}
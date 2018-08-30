<?php
class PressRoutes {
    // Press Page (public)
    static public function webPressPage(){
        $pressList = PressAPI::getPressList();
    
        Render::page("content_press.php", [
            "pressList" => $pressList,
        ]);
    }

    // Press Detail Pages (public)
    static public function webPressDetails($params){
        $press = PressAPI::getPressByURLname($params["press"]);
    
        Render::page("content_press_item.php", [
            "press" => $press
        ]);
    
        // TODO: this code will break and not display correct page if you do not put a service that exists
    }

    // Add Press Item (admin)
    static public function adminPressAdd(){
        Render::admin_page("admin_press_add.php");
    }
    
    // Press List Page (admin)
    static public function adminPressList(){
        // contains edit and delete
        $pressList = PressAPI::getPressList();
        $rows = PressAPI::getPressList()->fetchAll();
        $pressCount = count($rows);
    
        Render::admin_page("admin_press_list.php", [
            "pressList" => $pressList,
            "pressCount" => $pressCount
        ]);
    }
    
    // Press Detail Page (admin)
    static public function adminPressDetails($params,$url){
        die($url);
        $id = $_GET["id"];
    
        if(empty($id)) {
            Route::redirect("/404");
        }
    
        $press = PressAPI::getPressByID($id);
    
        if ($service === NULL) {
            Route::redirect("/404");
        }
    
        Render::page("content_press_item.php", [
            "press" => $press
        ]);
    }
}
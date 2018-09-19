<?php
class PressRoutes {
    // Press Page (public)
    static public function webPressList() {
        $pressList = PressAPI::getPressList();
        Render::page("content_press.php", [
            "pressList" => $pressList,
        ]);
    }

    // Press Detail Pages (public)
    static public function webPressDetails($params) {
        $press = PressAPI::getPressByURLname($params["press"]);
    
        Render::page("content_press_item.php", [
            "press" => $press
        ]);
    
        // TODO: this code will break and not display correct page if you do not put a service that exists
    }

    // Add Press Item (admin)
    static public function adminPressAdd() {
        Render::admin_page("admin_press_add.php");
    }
    
    // Press List Page (admin)
    static public function adminPressList() {
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
    static public function adminPressDetails($params,$url) {
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

    // Add Press API (functional)
    static public function apiPressAdd() {
        $status = Validate::parameters($_POST, [
            "publication" => ["required" => true, "type" => "string"],
            "content" => ["required" => true, "type" => "string"],
            "urlname" => ["required" => true, "type" => "string"],
            "primary_image" => ["required" => true, "type" => "string"],
            "secondary_image" => ["required" => false, "type" => "string"],
            "link" => ["required" => false, "type" => "string"]
        ]);

        if($status === true) {
            PressAPI::insertPress(
                $_POST["publication"],
                $_POST["content"],
                $_POST["urlname"],
                $_POST["primary_image"],
                $_POST["secondary_image"],
                $_POST["link"]
            );
            Route::redirect("/press/list");
        } else {
            error_log("Failed to create press");
            Route::redirect("/press/add?error=$status");
        }
    }

    // Edit Press API (functional)
    static public function apiPressEdit() {
        $status = Validate::parameters($_POST, [
            "publication" => ["required" => true, "type" => "string"],
            "content" => ["required" => true, "type" => "string"],
            "urlname" => ["required" => true, "type" => "string"],
            "primary_image" => ["required" => true, "type" => "string"],
            "secondary_image" => ["required" => false, "type" => "string"],
            "link" => ["required" => false, "type" => "string"]
        ]);

        if($status === true) {
            PressAPI::editPress($_POST);
            Route::redirect("/press/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit press details.");
            Route::redirect("/press/details?error=$status");
        }
    }

    // Delte Press API (functional)
    static public function apiPressDelete() {
        $status = Validate::parameters($_GET, [
            "id" => ["required" => true, "type" => "integer"]
        ]);

        if($status === true) {
            PressAPI::deletePress($_GET["id"]);
            Route::redirect("/press/list");
        } else {
            error_log("Failed to delete press.");
            Route::redirect("/press/details?error=$status");
        }
    }
}
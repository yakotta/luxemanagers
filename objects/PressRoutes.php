<?php
class PressRoutes {
    // Press Page (public)
    static public function webPressPage(){
        $pressList = PressAPI::getPressList();
    
        Render::page("content_press.php", [
            "pressList" => $pressList,
        ]);
    }
}
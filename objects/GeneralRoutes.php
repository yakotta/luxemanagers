<?php
class GeneralRoutes {
    // Home Page
    static public function webHomePage(){
        $serviceList = ServiceAPI::getServiceList();
        $testimonialList = TestimonialAPI::getTestimonialList();
        $featuredPressList = PressAPI::getFeaturedPressList();
    
        render_page("content_home.php",[
            "testimonialList" => $testimonialList,
            "serviceList" => $serviceList,
            "featuredPressList" => $featuredPressList
        ]);
    }
    
    //About Page
    static public function webAboutPage(){
        render_page("content_about.php");
    }
}
<?php
class TestimonialRoutes {
    // Testimonial List (admin)
    static public function adminTestimonialList(){
        $testimonialList = TestimonialAPI::getTestimonialList();
    
        Render::admin_page("admin_testimonial_list.php", [
            "testimonialList" => $testimonialList,
        ]);
    }
    
    // Add Testimonal (admin)
    static public function adminTestimonialAdd(){
        $validFields = [];
        $failedFields = [];
        
        Render::admin_page("admin_testimonial_add.php", [
            "validFields" => $validFields,
            "failedFields" => $failedFields,
        ]);
    }
    
    // Edit Testimonial (admin)
    static public function adminTestimonialEdit(){
        
    }

    
    // Add Testimonial API (functional)
    static public function apiTestimonialAdd(){
        // Make sure the fields are filled out and file is uploaded
        $status_sent = "fail";
        $status_fields = Validate::parameters($_POST, [
            "name" => ["required" => true, "type" => "string"],
            "title" => ["required" => true, "type" => "string"],
            "quote" => ["required" => true, "type" => "string"],
            "link" => ["required" => false, "type" => "string"],
        ]);
        
        $status_files = Validate::parameters($_FILES, [
            "image" => [
                "required" => true,
                "type" => "file",
                "options" => ["image/jpeg","image/png"]
            ]    
        ]);

        if($status_fields === true && $status_files === true){
            $id = TestimonialAPI::insertTestimonial($_POST["name"], $_POST["title"], $_POST["quote"], $_POST["link"]);
            
            $id = intval($id);
            if($id > 0) {
                $filename = $id . "_" . String::slugify($_POST["name"], '-', '.');
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], __DIR__."/../uploads/testimonials/$filename");
                
                if($upload === true) {
                    TestimonialAPI::setTestimonialImage($id, $filename);
                    $status_sent = "success";
                } else {
                    TestimonialAPI::deleteTestimonial($id);
                }
            }
        }
        
        if($status_sent === "success"){
            Route::redirect($_POST["url_success"] . "/" . $id);
        } else {
            Route::redirect($_POST["url_failure"]);
        }
    }
    
    // Edit Testimonial API (functional)
    static public function apiTestimonialEdit(){
        
    }
    
    // Delete Testimonial API (functional)
    static public function apiTestimonialDelete($params){
        $status_delete = "fail";
        
        if(intval($params["id"]) > 0){
            TestimonialAPI::deleteTestimonial($params["id"]);
            $status_delete = "success";
        }
        
        Route::redirect(Route::rewrite_url("/admin/testimonials?status=$status_delete"));
    }
}
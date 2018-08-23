<?php

class EmploymentRoutes {
    // Employment Page (public)
    static public function webEmploymentPage() {
        Render::page("content_employment.php");
    }

    // Resume page (admin)
    static public function adminResumeList(){
        $resumeList = EmploymentAPI::getResumeList();
        $rows = EmploymentAPI::getResumeList()->fetchAll();
        $resumeCount = count($rows);
    
        Render::admin_page("admin_resume_list.php", [
            "resumeList" => $resumeList,
            "resumeCount" => $resumeCount
        ]);
    }
    
    // Send Resume API (functional)
    static public function apiSendResume(){
        // Make sure the fields are filled out and file is uploaded
        $status_sent = "fail";
        $status_fields = Validate::parameters($_POST, [
            "name" => ["required" => true, "type" => "string"], 
            "email" => ["required" => true, "type" => "email"], 
            "phone" => ["required" => false, "type" => "phone"]
        ]);

        $status_files = Validate::parameters($_FILES, [
            "resume" => [
                "required" => true, 
                "type" => "file", 
                "options" => [
                    "application/msword", 
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
                    "application/pdf"
                ]
            ]
        ]);
        
        if($status_fields === true && $status_files === true) {
            $filename = String::unique_filename(String::slugify($_POST["name"]) . "_" . $_FILES["resume"]["name"]);
            
            move_uploaded_file($_FILES['resume']['tmp_name'], __DIR__."/../uploads/resumes/$filename");
            EmploymentAPI::insertResume($_POST["name"], $_POST["email"], $_POST["phone"], $filename, $_POST["message"]);
            
            $_POST["resume_url"] = "http://".$_SERVER["HTTP_HOST"]."/uploads/resume/$filename";
            
            $luxe_email = "pinkhamjenna@gmail.com";
    
            // email to luxe
            $to = [ "name" => "LUXE Managers", "email" => $luxe_email ];
            $from = [ "name" => $_POST["name"], "email" => $_POST["email"] ];
            $subject = "New resume uploaded to luxemanagers.com";
            $template_luxe = Render::template(__DIR__."/../templates/email_resume_luxe.php", $_POST);
            
            Email::send($to, $from, $subject, $template_luxe);
            
            // email to client
            $to = [ "name" => $_POST["name"], "email" => $_POST["email"] ];
            $from = [ "name" => "Luxe Managers", "email" => $luxe_email ];
            $subject = "Thank you for applying to LUXE Luxury Lifestyle Managers";
            $template_user = Render::template(__DIR__."/../templates/email_resume_user.php", $_POST);
            
            Email::send($to, $from, $subject, $template_user);
            
            $status_sent = "success";
        }
        
        list($url) = explode("?", $_POST["url_return"]);
        Route::redirect("$url?status=$status_sent#employment-form");
    }
}
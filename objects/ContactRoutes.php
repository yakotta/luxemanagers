<?php
class ContactRoutes {
    // Contact Page (public)
    static public function webContactPage() {
        Render::page("content_contact.php");
    }

    // Message page (admin)
    static public function adminContactPage() {
        $messageList = ContactAPI::getMessageList();
        $rows = ContactAPI::getMessageList()->fetchAll();
        $messageCount = count($rows);
    
        Render::admin_page("admin_message_list.php", [
            "messageList" => $messageList,
            "messageCount" => $messageCount
        ]);
    }
    
    // Send Message API (functional)
    static public function apiSendMessage() {
        // Make sure the fields are filled out and file is uploaded
        $status_sent = "fail";
        $status_fields = Validate::parameters($_POST, [
            "name" => ["required" => true, "type" => "string"],
            "email" => ["required" => true, "type" => "email"],
            "phone" => ["required" => false, "type" => "phone"],
            "preference" => ["required" => true, "type" => "string"],
            "message" =>["required" => true, "type" => "string"]
        ]);
        
        if($status_fields === true) {
            $insertContacts = ContactAPI::insertContact(
                $_POST["name"], 
                $_POST["email"], 
                $_POST["phone"], 
                $_POST["preference"], 
                $_POST["message"]
            );
            
            if(empty($_POST["phone"])) $_POST["phone"] = "not provided";
            
            // TODO: make this a site config value stored in the database perhaps?
            // HINT: SiteConfig::get("luxe_email");
            $luxe_email = "pinkhamjenna@gmail.com";
    
            // email to luxe
            $to = [ "name" => "LUXE Managers", "email" => $luxe_email ];
            $from = [ "name" => $_POST["name"], "email" => $_POST["email"] ];
            $subject = "New client message from luxemanagers.com";
            $template_luxe = Render::template(__DIR__."/../templates/email_contact_luxe.php", $_POST);
            
            Email::send($to, $from, $subject, $template_luxe);
            
            // email to client
            $to = [ "name" => $_POST["name"], "email" => $_POST["email"] ];
            $from = [ "name" => "Luxe Managers", "email" => $luxe_email ];
            $subject = "Thank you for contacting LUXE Luxury Lifestyle Managers";
            $template_user = Render::template(__DIR__."/../templates/email_contact_user.php", $_POST);
            
            Email::send($to, $from, $subject, $template_user);
            
            $status_sent = "success";
            Validate::reset();
        }
        
        list($url) = explode("?", $_POST["url_return"]);
        Route::redirect("$url?status=$status_sent#contact-form");
    }
}
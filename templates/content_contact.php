<main class="col-md-10 col-md-offset-1">
     <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
        <div class="alert alert-success" role="alert">
          Thank you for contacting Luxe Managers! Our team will get back to you
          as soon as possible. Have a nice day!
        </div>
    <?php endif ?>
    
    <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
        <div class="alert alert-danger" role="alert">
          Sorry, something went wrong. Please ensure all fields are filled out correctly,
          or refresh the page and try submitting your inquiry again.
        </div>
    <?php endif ?>
    
    <?=render_template("templates/form_contact.php")?>
</main>
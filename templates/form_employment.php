<div class="row">
    <div class="col-md-4">
        <h2>Apply to Luxe</h2>
        <h4>Interested in working for Luxe Managers?</h4>
        <p class="align-justify">
            blah blah blah 
        </p>
    </div>

    <div class="col-md-8 contact-form">
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
              Thank you for applying to Luxe Managers! We will review your resume and
              get back to you shortly. 
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
              Sorry, something went wrong. Please ensure all fields are filled out correctly,
              or refresh the page and try submitting your resume again.
            </div>
        <?php endif ?>
    
        <form method="post" action="<?=Route::rewrite_url('/api/send-resume')?>" class="contact-form" enctype="multipart/form-data">
            <a name="employment-form"></a>
            <input type="hidden" name="url_return" value="<?=$_SERVER['REQUEST_URI']?>" />
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="contact-name">Name: </label>
                    <input type="text" class="form-control" name="name" id="contact-name" required />
                </div>

                <div class="form-group col-md-6">
                    <label for="contact-phone">Phone Number: </label>
                    <input type="text" class="form-control" name="phone" id="contact-phone" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="contact-email">Email: </label>
                    <input type="text" class="form-control" name="email" id="contact-email" required />
                </div>
                <div class="form-group col-md-6">
                    <label for="contact-resume">Resume: </label>
                    <input type="file" class="form-control" name="resume" id="contact-resume" required />
                </div>
            </div>
            <div class="form-group">
                <label for="contact-message">
                    How would you be an asset to Luxe Managers?
                </label>
                <textarea class="form-control autoresize" name="message" id="contact-message" value="" rows=4></textarea>
            </div>
            <div class="button-wrapper">
                <div class="submitbutton">
                    <button type="submit" class="btn btn-default">Submit Resume</button>
                </div>
            </div>
        </form>
    </div>
</div>
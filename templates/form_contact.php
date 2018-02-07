<div class="row">
    <div class="col-md-4">
        <h2>Contact Luxe</h2>
        <h4>How may we help you?</h4>
        <p class="align-justify italic-link">
            Interested in getting started with Luxe? Want to learn more about our 
            services? Call, email, or use the contact form to the right to see how 
            Luxe Luxury Lifestyle Managers can be of service to you today. Interested
            in working for Luxe? <a href="<?=rewrite_url('/employment')?>">Click here 
            to send us your resume.</a>
        </p>
        <div class="contact-icons">
            <p>
                <span class="glyphicon glyphicon-phone-alt"></span> 
                <?=getSiteConfig("phone")?>
            </p>
            <p>
                <span class="glyphicon glyphicon-envelope"></span>
                <?=getSiteConfig("email")?>
            </p>
        </div> 
    </div>

    <div class="col-md-8 contact-form">
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
    
        <form method="post" action="<?=rewrite_url('/api/send-message')?>" class="contact-form">
            <a name="contact-form"></a>
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
                    <label for="contact-preference">Contact Preference: </label>
                    <select class="form-control" name="preference" id="contact-preference" value="email">
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="contact-message">
                    What services are you interested in learning more about?
                </label>
                <textarea class="form-control autoresize" name="message" id="contact-message" value="" rows=4></textarea>
            </div>

            <div class="button-wrapper">
                <div class="submitbutton">
                    <button type="submit" class="btn btn-default">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>
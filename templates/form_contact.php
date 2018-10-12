<?php
function hasFailure($field) {
    return Validate::didItFailLikeChrisThomasFails($field) ? 'has-error':'';
}

function isSelected($field, $value) {
    return Validate::getFieldValue($field) === $value ? 'selected':'';
}
?>

<div class="row">
    <div class="col-md-4">
        <h2>Contact Luxe</h2>
        <h4>How may we help you?</h4>
        <p class="align-justify">
            Interested in getting started with Luxe? Want to learn more about our 
            services? Call, email, or use the contact form to the right to see how 
            Luxe Luxury Lifestyle Managers can be of service to you today.
        </p>
        <div class="contact-icons">
            <p>
                <span class="glyphicon glyphicon-phone-alt"></span> 
                <?=SiteConfig::getSiteConfig("phone")?>
            </p>
            <p>
                <span class="glyphicon glyphicon-envelope"></span>
                <?=SiteConfig::getSiteConfig("email")?>
            </p>
        </div> 
        
        <div class="section-seperator clearfix">
            <div class="wingding col-md-10 col-md-offset-1"></div>
        </div>
        
        <p class="align-justify italics-link">
            Interested in working for Luxe? 
            <a href="<?=Route::rewrite_url('/employment')?>">Send us your resume.</a>
        </p>
    </div>

    <div class="col-md-8 contact-form">
        <!-- Status Success/Error Messages -->
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
    
        <!-- Form -->
        <form method="post" action="<?=Route::rewrite_url('/api/send-message')?>" class="contact-form">
            <a name="contact-form"></a>
            <input type="hidden" name="url_return" value="<?=$_SERVER['REQUEST_URI']?>" />
            <div class="row">
                <div class="form-group col-md-6 <?=hasFailure('name')?>">
                    <label for="contact-name">Name: </label>
                    <input  type="text" 
                            class="form-control"
                            name="name"
                            id="contact-name"
                            placeholder="required"
                            value="<?=Validate::getFieldValue('name')?>"
                            required />
                </div>

                <div class="form-group col-md-6 <?=hasFailure('phone')?>">
                    <label for="contact-phone">Phone Number: </label>
                    <input  type="text"
                            class="form-control"
                            name="phone"
                            id="contact-phone"
                            value="<?=Validate::getFieldValue('phone')?>" />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 <?=hasFailure('email')?>">
                    <label for="contact-email">Email: </label>
                    <input  type="text"
                            class="form-control"
                            name="email"
                            id="contact-email"
                            placeholder="required"
                            value="<?=Validate::getFieldValue('email')?>"
                            required />
                </div>

                <div class="form-group col-md-6 <?=hasFailure('preference')?>">
                    <label for="contact-preference">Contact Preference: </label>
                    <select class="form-control"
                            name="preference"
                            id="contact-preference"
                            value="<?=Validate::getFieldValue('preference')?>" />
                        <option value="email" <?=isSelected('preference', 'email')?>>Email</option>
                        <option value="phone" <?=isSelected('preference', 'phone')?>>Phone</option>
                    </select>
                </div>
            </div>

            <div class="form-group <?=hasFailure('message')?>">
                <label for="contact-message">
                    What services are you interested in learning more about?
                </label>
                <textarea   class="form-control autoresize"
                            name="message" id="contact-message"
                            rows=4><?=Validate::getFieldValue('message')?></textarea>
            </div>

            <div class="btn-wrapper">
                <div class="submitbutton">
                    <button type="submit" class="btn btn-default">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php Validate::reset(); ?>
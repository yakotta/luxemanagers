<div class="row">
    <div class="col-md-4">
        <h2>Contact Luxe</h2>
        <h4>How may we help you?</h4>
        <p>
            Interested in getting started with Luxe? Want to learn more about our 
            services? Call, email, or use the contact form to the right to see how 
            Luxe Luxury Lifestyle Managers can be of service to you today. 
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

    <div class="col-md-8">
        <form method="post" action="<?=rewrite_url('/api/send-message')?>" class="contact-form">
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
                        <option>Email</option>
                        <option>Phone</option>
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
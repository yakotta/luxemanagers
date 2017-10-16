<div class="row">
    <div class="col-md-2">
        blah blah blah    
    </div>

    <div class="col-md-4">
        <h2>Contact</h2>
        <h3>How may we help you?</h3>
        <p>
            Call or send an email to learn more about how LUXE Luxury Lifestyle Managers can be of service to you today.
        </p>
        <p><?=getSiteConfig("phone")?></p>
        <p><?=getSiteConfig("email")?></p>
    </div>

    <div class="col-md-4">
        <form method="post" action="<?=rewrite_url('/api/send-message')?>" class="contact-form">
            <div class="form-group">
                <label for="contact-name">Name: </label>
                <input type="text" class="form-control" name="name" id="contact-name" required />
            </div>

            <div class="form-group">
                <label for="contact-email">Email: </label>
                <input type="text" class="form-control" name="email" id="contact-email" required />
            </div>

            <div class="form-group">
                <label for="contact-phone">Phone Number: </label>
                <input type="text" class="form-control" name="phone" id="contact-phone" />
            </div>

            <div class="form-group">
                <label for="contact-preference">Contact Preference: </label>
                <select class="form-control" name="preference" id="contact-preference" value="email">
                    <option>Email</option>
                    <option>Phone</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contact-message">
                    What services are you interested in learning more about?
                </label>
                <textarea class="form-control autoresize" name="message" id="contact-message" value="" rows=4></textarea>
            </div>

            <div class="submitbutton">
                <button type="submit" class="btn btn-default">Send Message</button>
            </div>
        </form>
    </div>

    <div class="col-md-2">
        blah blah blah    
    </div>
</div>
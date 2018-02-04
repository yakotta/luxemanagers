<div class="row">
    <div class="col-md-4">
        <h2>Apply to Luxe</h2>
        <h4>Interested in working for Luxe Managers?</h4>
        <p class="align-justify">
            blah blah blah 
        </p>
    </div>

    <div class="col-md-8 contact-form">
        <form method="post" action="<?=rewrite_url('/api/send-resume')?>" class="contact-form" enctype="multipart/form-data">
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
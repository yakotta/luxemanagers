<form method="post" action="<?=Route::rewrite_url('/api/testimonials/add')?>" enctype="multipart/form-data">
    <input type="hidden" name="url_success" value="<?=Route::rewrite_url('/admin/testimonials/edit')?>" />
    <input type="hidden" name="url_failure" value="<?=Route::rewrite_url('/admin/testimonials/add')?>" />

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="name">Name</span>
            <input type="text" name="name" class="form-control" aria-describedby="name" required />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="title">Company and Position</span>
            <input type="text" name="title" class="form-control" aria-describedby="title" required />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="quote">Quote</span>
            <textarea name="quote" class="form-control autoresize" aria-describedby="quote" rows="2" required></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="link">Attribution Link</span>
            <input type="text" name="link" class="form-control" aria-describedby="link" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="image">Photo</span>
            <input type="file" name="image" class="form-control" aria-describedby="image" required />
        </div>
    </div>
    
    <div class="form-group text-center">
        <button type="submit" class="submit-btn btn btn-default">Add Testimonial</button>
    </div>
</form>
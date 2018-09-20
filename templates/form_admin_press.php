<form method="post" action="<?=Route::rewrite_url('/api/press/add')?>" enctype="multipart/form-data">
    <input type="hidden" name="url_success" value="<?=Route::rewrite_url('/admin/press/edit')?>" />
    <input type="hidden" name="url_failure" value="<?=Route::rewrite_url('/admin/press/add')?>" />

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="publication">Publication</span>
            <input type="text" name="publication" class="form-control" aria-describedby="publication" required />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="content">Content</span>
            <textarea name="content" class="form-control autoresize" aria-describedby="content" rows="2" required></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="urlname">Internal URL</span>
            <input type="text" name="urlname" class="form-control" aria-describedby="urlname" required />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="primary_image">Primary Image</span>
            <input type="file" name="primary_image" class="form-control" aria-describedby="primary_image" required />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="secondary_image">Secondary Image</span>
            <input type="file" name="secondary_image" class="form-control" aria-describedby="secondary_image" />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="link">External Link</span>
            <input type="text" name="link" class="form-control" aria-describedby="link" />
        </div>
    </div>
    
    <div class="form-group text-center">
        <button type="submit" class="submit-btn btn btn-default">Add Testimonial</button>
    </div>
</form>
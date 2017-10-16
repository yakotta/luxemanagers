<form method="post" action="/api/services/add">
    <div class="form-group">
        Add a New Service
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-service-name">Service Name</span>
            <input type="text" name="name" class="form-control" aria-describedby="new-service-name">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-service-short">Short Description</span>
            <input type="text" name="short_description" class="form-control" aria-describedby="new-service-short" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-service-full">Full Description</span>
            <textarea name="full_description" class="form-control autoresize" aria-describedby="new-service-full" rows="2"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-service-image">Link to an image</span>
            <input type="text" name="image" class="form-control" aria-describedby="new-service-image">
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-service-link">URL</span>
            <input type="text" name="link" class="form-control" aria-describedby="new-service-phone">
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="submit-btn btn btn-default">Add a service</button>
    </div>
</form>
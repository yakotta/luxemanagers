<div class="press-item">
    <h4><?=$press["publication"]?></h4>
    <div class="row">
        <img class="col-md-3" src="<?=rewrite_url($press["publication_image"])?>" />
        <img class="col-md-3" src="<?=rewrite_url($press["marketing_image"])?>" />
        <div class="col-md-6">
            <p><?=$press["content"]?></p>
        </div>
    </div>
</div>
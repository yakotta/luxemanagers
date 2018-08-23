<div class="press-item col-md-6">
    <h4><?=$press["publication"]?></h4>
    <img class="col-md-6" src="<?=Route::rewrite_url('/uploads/press/' . $press["primary_image"])?>" />
    <div class="col-md-6">
        <p class="align-justify"><?=$press["content"]?></p>
        <?php if(!empty($press["link"])): ?>
        <p class="align-justify"><a href="<?=$press["link"]?>" target="_blank">
            See more <span class="glyphicon glyphicon-menu-right small"></span>
        </a></p>
        <?php endif ?>
    </div>
</div>
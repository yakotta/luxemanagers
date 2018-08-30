<?php $press["urlname"] = Route::rewrite_url("/press/{$press["urlname"]}"); ?>

<div class="press-item col-md-6">
    <h4 class="media-heading"><?=$press["publication"]?></h4>
    <img class="col-md-6" src="<?=Route::rewrite_url('/uploads/press/' . $press["primary_image"])?>" />
    <div class="col-md-6">
        <p class="align-justify"><?=$press["content"]?></p>
        <p class="align-justify"><a href="<?=$press["urlname"]?>">
            See more <span class="glyphicon glyphicon-menu-right small"></span>
        </a></p>
    </div>
</div>
<?php $service["link"] = Route::rewrite_url("/services/{$service["link"]}"); ?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <a href="<?=$service["link"]?>">
            <img class="background"
                 src="<?=Route::rewrite_url($service["image"])?>"
                 alt="<?=$service["name"]?>" 
            />
        </a>

        <div class="caption">
            <h3><a href="<?=$service["link"]?>"><?=$service["name"]?></a></h3>
        </div>
    </div>
</div>
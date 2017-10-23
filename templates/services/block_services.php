<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img class="background"
             src="<?=rewrite_url($service["image"])?>"
             alt="<?=$service["name"]?>" />

        <div class="caption">
            <h3><a href="<?=rewrite_url("/services/{$service["link"]}")?>"><?=$service["name"]?></a></h3>
        </div>
    </div>
</div>

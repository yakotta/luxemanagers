<div class="row">
    <?php foreach($serviceList as $service): ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img class="background"
                     src="<?=get_resource($service["image"])?>"
                     alt="<?=$service["name"]?>" />

                <div class="caption">
                    <h3><a href="service/<?=$service["link"]?>"><?=$service["name"]?></a></h3>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>
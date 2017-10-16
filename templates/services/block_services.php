<div class="row">
    <?php foreach($serviceList as $service): ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <span class="glyphicon glyphicon-picture"></span> <!--<img src="..." alt="...">-->
                <div class="caption">
                    <h3><?=$service["name"]?></h3>
                    <p><?=$service["short_description"]?></p>
                    <p><a href="service/<?=$service["link"]?>" class="btn btn-primary" role="button">Read More <small><span class="glyphicon glyphicon-chevron-right"></span></small></a></p>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>
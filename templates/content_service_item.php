<main class="col-md-10 col-md-offset-1">
    <div class="container-fluid">
        <h1><?=$service["name"]?></h1>
        <div class="align-justify"><?=$service["full_description"]?></div>
        
        <?php /*<img class="img-responsive" src="<?=rewrite_url($service["image"])?>" /> */ ?>

        <p class="go-back">
            <a href="<?=Route::rewrite_url('/services')?>">
                <span class="glyphicon glyphicon-menu-left small"></span>Back to services
            </a>
        </p>
   </div>
</main>
<main class="col-md-10 col-md-offset-1">
    <div class="press-item container-fluid">
        <h1><?=$press["publication"]?></h1>
        <div class="align-justify"><?=$press["content"]?></div>
        <?php if(!empty($press["link"])): ?>
            <p class="align-right"><a href="<?=$press["link"]?>" target="_blank">
                Get more information <span class="glyphicon glyphicon-menu-right small"></span>
            </a></p>
        <?php endif ?>

        <div class="text-center press-small-img">
            <img src="<?=Route::rewrite_url('/uploads/press/' . $press["primary_image"])?>" />

            <?php if(!empty($press["secondary_image"])): ?>
                <img src="<?=Route::rewrite_url('/uploads/press/' . $press["secondary_image"])?>" />
            <?php endif ?>
        </div>

        <p class="go-back">
            <a href="<?=Route::rewrite_url('/press')?>">
                <span class="glyphicon glyphicon-menu-left small"></span>Back to press
            </a>
        </p>
   </div>
</main>


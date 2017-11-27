<main>
    <div class="container-fluid">
        <h1><?=$service["name"]?></h1>
        <?=$service["full_description"]?>
        <img class="img-responsive" src="<?=rewrite_url($service["image"])?>" />
   </div>
</main>
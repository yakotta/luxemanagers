<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">LUXE As Seen in <?=$press["publication"]?></h3>
    </div>
    <div class="panel-body">
        <img src="<?=rewrite_url($press["marketing_image"])?>" />
        <?=$press["content"]?>
        Click below to read online at <?=$press["publication"]?><br/>
        <a href="<?=$press["link"]?>">
            <img src="<?=rewrite_url($press["publication_image"])?>" alt="<?=$press["publication"]?>" />
        </a>
    </div>
</div>
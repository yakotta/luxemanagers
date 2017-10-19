<?php
if(empty($testimonial["link"])){
    $name = $testimonial["name"];
} else {
    $name = "<a href='{$testimonial["link"]}'>{$testimonial["name"]}</a>";
}
?>
<div class="media col-sm-4">
    <div class="media-left">
        <img class="media-object" src="<?=rewrite_url($testimonial["image"])?>" alt="<?=$testimonial["name"]?>">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?=$testimonial["name"]?></h4>
        "<?=$testimonial["quote"]?>" – <?=$name?>, <?=$testimonial["title"]?>
    </div>
</div>
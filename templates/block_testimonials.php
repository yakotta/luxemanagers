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
        <p class="align-justify">"<?=$testimonial["quote"]?>"</p> 
        <p class="align-right">&mdash; <?=$name?>, <?=$testimonial["title"]?></p>
    </div>
</div>
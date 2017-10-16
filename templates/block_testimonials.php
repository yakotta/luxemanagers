<?php
if(empty($testimonial["link"])){
    $name = $testimonial["name"];
} else {
    $name = "<a href='{$testimonial["link"]}'>{$testimonial["name"]}</a>";
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?=$testimonial["name"]?></h3>
    </div>
    <div class="panel-body">
        <img class="img-circle" src="<?=$testimonial["image"]?>" />
        <p>
            "<?=$testimonial["quote"]?>" – <?=$name?>, <?=$testimonial["title"]?>
        </p>
    </div>
</div>
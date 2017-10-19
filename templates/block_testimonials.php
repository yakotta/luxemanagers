<?php
if(empty($testimonial["link"])){
    $name = $testimonial["name"];
} else {
    $name = "<a href='{$testimonial["link"]}'>{$testimonial["name"]}</a>";
}
?>

<?php if(!empty($_GET["old"])): ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?=$testimonial["name"]?></h3>
    </div>
    <div class="panel-body">
        <img class="img-circle" src="<?=get_resource($testimonial["image"])?>" />
        <p>
            "<?=$testimonial["quote"]?>" – <?=$name?>, <?=$testimonial["title"]?>
        </p>
    </div>
</div>
<?php else: ?>
<div class="media col-sm-4">
    <div class="media-left">
        <img class="media-object" src="<?=get_resource($testimonial["image"])?>" alt="<?=$testimonial["name"]?>">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?=$testimonial["name"]?></h4>
        "<?=$testimonial["quote"]?>" – <?=$name?>, <?=$testimonial["title"]?>
    </div>
</div>
<?php endif ?>

<?php
$sliderList = [
    [
        "image" => "/resources/slider/luxe-white-glove.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ]
];
?>
<section class="clearfix slider jumbotron">
    <div class="container-fluid">
        <?php foreach($sliderList as $slide): ?>
            <img class="background" src="<?=rewrite_url($slide["image"])?>" />
            <div class="content">
                <h1><?=$slide["h1"]?></h1>
                <p>...</p>
                <p><a class="btn btn-primary btn-lg" href="<?=$slide["link_href"]?>" role="button"><?=$slide["link_text"]?></a></p>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?php
$sliderList = [
    [
        "image" => "/resources/slider/slider.01.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ],[
        "image" => "/resources/slider/slider.02.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ],[
        "image" => "/resources/slider/slider.03.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ],[
        "image" => "/resources/slider/slider.04.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ],[
        "image" => "/resources/slider/slider.05.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ],[
        "image" => "/resources/slider/slider.06.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
    ]
];
?>
<section class="clearfix jumbotron container-fluid carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach($sliderList as $key => $slide): ?>
            <div class="item <?=$key == 0 ? "active" : ""?>">
                <img class="background" src="<?=rewrite_url($slide["image"])?>" alt="slide">
                <!-- div class="carousel-caption">
                    <a class="btn btn-primary btn-lg" href="<?=$slide["link_href"]?>" role="button"><?=$slide["link_text"]?></a>
                </div -->
            </div>
        <?php endforeach ?>
    </div>
</section>

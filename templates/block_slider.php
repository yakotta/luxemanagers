<?php
$sliderList = [
    [
        "image" => "/resources/slider/slider_01.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Attention to detail",
        "h2" => "Perfection is all that we do",
    ],[
        "image" => "/resources/slider/slider_02.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "We'll cross oceans for you",
        "h2" => "No request is too big",
    ],[
        "image" => "/resources/slider/slider_03.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Modern luxury living",
        "h2" => "Good old fashioned service",
    ],[
        "image" => "/resources/slider/slider_04.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Five-star hospitality",
        "h2" => "in the comfort of your own home",
    ],[
        "image" => "/resources/slider/slider_05.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Wherever you go",
        "h2" => "go Luxe ",
    ],[
        "image" => "/resources/slider/slider_06.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Every want, every need, fulfilled",
        "h2" => "Discretely, immediately, impeccably",
    ],[
        "image" => "/resources/slider/slider_07.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Your lifestyle concierege",
        "h2" => "never be grounded by life's details",
    ],[
        "image" => "/resources/slider/slider_08.jpg",
        "link_href" => "#read-more",
        "link_text" => "Learn more",
        "h1" => "Life the life",
        "h2" => "live luxe",
    ]
];
?>
<section class="clearfix jumbotron container-fluid carousel slide" data-ride="carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!-- ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach($sliderList as $key => $slide): ?>
            <div class="item <?=$key == 0 ? "active" : ""?>">
                <img class="background" src="<?=rewrite_url($slide["image"])?>" alt="slide">
                <div class="carousel-caption">
                    <h1><?=$slide["h1"]?></h1>
                    <h2><?=$slide["h2"]?></h2>
                    <!-- a class="btn btn-primary btn-lg" href="<?=$slide["link_href"]?>" role="button"><?=$slide["link_text"]?></a -->
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</section>

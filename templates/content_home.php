<main>
    <?=render_template(__DIR__."/block_slider.php")?>

    <section class="services container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <h2>Our Services</h2>
            <div class="row">
                <?php foreach($serviceList as $service){
                    print(render_template("templates/block_services.php", [
                        "service" => $service
                    ]));
                } ?>
            </div>
        </div>
    </section>

    <?=render_template("templates/block_section_seperator.php")?>

    <section class="testimonials container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <h2>Testimonials</h2>
            <?php foreach($testimonialList as $testimonial){
                print(render_template("templates/block_testimonials.php", [
                    "testimonial" => $testimonial
                ]));
            }?>
        </div>
    </section>

    <?=render_template("templates/block_section_seperator.php")?>

    <section class="press container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <h2>Press</h2>
            <div class="press-block">
                <?php foreach($featuredPressList as $press){
                    print(render_template("templates/block_press.php", [
                        "press" => $press
                    ]));
                }?>
            </div>
            <h4 class="see-more"><a href="<?=rewrite_url('/press')?>">
                See more <span class="glyphicon glyphicon-menu-right small"></span>
            </a></h4>
        </div>
    </section>

    <?=render_template("templates/block_section_seperator.php")?>

    <section class="contact container-fluid">
		<div class="col-md-10 col-md-offset-1">
            <?=render_template("templates/form_contact.php")?>
        </div>
    </section>
</main>
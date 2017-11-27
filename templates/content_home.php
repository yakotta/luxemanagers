<main>
    <section class="clearfix slider jumbotron">
        <div class="container-fluid">
            <img class="background" src="<?=rewrite_url("/resources/slider/luxe-white-glove.jpg")?>" />
            <div class="content">
                <h1>Sliders here</h1>
                <p>...</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
    </section>

    <section class="services container-fluid">
        <h2>Our Services</h2>
        <div class="row">
            <?php foreach($serviceList as $service){
                print(render_template("templates/services/block_services.php", [
                    "service" => $service
                ]));
            } ?>
        </div>
    </section>

    <section class="testimonials container-fluid">
        <h2>Testimonials</h2>
        <?php foreach($testimonialList as $testimonial){
            print(render_template("templates/block_testimonials.php", [
                "testimonial" => $testimonial
            ]));
        }?>
    </section>

    <section class="press container-fluid">
        <h2>Press</h2>
        <div class="row">
            <?php foreach($pressList as $press){
                print(render_template("templates/block_press.php", [
                    "press" => $press
                ]));
            }?>
        </div>
    </section>

    <section class="contact container-fluid">
		<?=render_template("templates/form_contact.php")?>
    </section>
</main>
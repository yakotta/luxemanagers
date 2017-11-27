<main>
    <?=render_template(__DIR__."/block_slider.php")?>

    <section class="services container-fluid">
        <h2>Our Services</h2>
        <div class="row">
            <?php foreach($serviceList as $service): ?>
                <?=render_template("templates/block_services.php", [
                    "service" => $service
                ])?>
            <?php endforeach?>
        </div>
    </section>
  
    <section class="testimonials container-fluid">
        <h2>Testimonials</h2>
        <div class="row">
            <?php foreach($testimonialList as $testimonial){
                print(render_template("templates/block_testimonials.php", [
                    "testimonial" => $testimonial
                ]));
            }?>
        </div>
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
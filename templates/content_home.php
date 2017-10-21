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
            <?php foreach($serviceList as $service): ?>
                <?=render_template("templates/services/block_services.php", [
                    "service" => $service
                ])?>
            <?php endforeach?>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">LUXE As Seen in Luxury Home Magazine</h3>
            </div>
            <div class="panel-body">
                <img src="http://luxemanagers.com/wp-content/uploads/2013/12/luxury-lifestyle-managers-ad-150x150.png" />
                UHNW Private Service Management is a truly unique field. LUXE Lifestyle Experts know that happiness is a direction, not a destination. The best service requires a solid executable system for service delivery that is specialized for each unique environment an …
            </div>
        </div>
    </section>

    <section class="contact container-fluid">
		<?=render_template("templates/form_contact.php")?>
    </section>
</main>
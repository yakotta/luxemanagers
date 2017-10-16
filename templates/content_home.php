<div class="clearfix slider jumbotron">
    <div class="container-fluid">
        <img class="background" src="<?=get_resource("/resources/slider/luxe-white-glove.jpg")?>" />
        <div class="content">
            <h1>Sliders here</h1>
            <p>...</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
</div>

<div class="calltoaction">
    <p>Call 1-650-385-8989 now or send an email to contact@luxemanagers.com to learn more about how Luxe Lifestyle Managers can be of service to you today.</p>
</div>

<main>
    <section class="services container-fluid">
        <h2>Services</h2>
		<?=render_template("templates/services/block_services.php", [
			"serviceList" => $serviceList
		])?>
    </section>
    
    <section class="publicity container-fluid">
        <section class="testimonials">
            <h2>Testimonials</h2>
            <?php foreach($testimonialList as $testimonial){
                print(render_template("templates/block_testimonials.php", [
                    "testimonial" => $testimonial
                ]));
            }?>
        </section>
        
        <section class="press">
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
    </section>
</main>
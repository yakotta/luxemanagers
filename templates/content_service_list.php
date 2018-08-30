<main class="container-fluid col-md-10 col-md-offset-1">
	<section id="intro" class="container-fluid">
		<h1>What We Do</h1>
		<p>The difference between ordinary and extraordinary is that little 
			extra, and we at Luxe provide out clients with that little extra 
			in everything we do.
		</p>
		<p>
			Luxe is a premium lifestyle management company. We work 
			entirely behind the scenes and operate with integrity and 
			discretion, while always keeping our client's best interests 
			at the center of our work. We make the magic happen for you 
			without you having to worry about the details. Plus, we are 
			fully licensed and bonded so our clients can enjoy the truly 
			extraordinary service we provide without a single worry. 
		</p>
		<p>
			While there is no project too big or too small for Luxe to 
			make happen, we do have a number of our most popular services 
			that we provide to our clients. 
		</p>
	</section>

	<section class="services container-fluid">
		<?php foreach($serviceList as $service): ?>
			<?=Render::template("templates/block_services.php", [
				"service" => $service
			])?>
		<?php endforeach ?>
    </section>
</main>
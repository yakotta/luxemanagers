<div class="slider jumbotron">
    <div class="container-fluid">
      <h1>Sliders here</h1>
      <p>...</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>
</div>

<div class="calltoaction">
    <p>Call 1-650-385-8989 now or send an email to contact@luxemanagers.com to learn more about how Luxe Lifestyle Managers can be of service to you today.</p>
</div>

<main>
    <section class="services container-fluid">
        <h2>Services</h2>
        <div class="row">
            <?php foreach($serviceList as $service): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="glyphicon glyphicon-picture"></span> <!--<img src="..." alt="...">-->
                        <div class="caption">
                            <h3><?=$service["name"]?></h3>
                            <p><?=$service["short_description"]?></p>
                            <p><a href="service/<?=$service["link"]?>" class="btn btn-primary" role="button">Read More <small><span class="glyphicon glyphicon-chevron-right"></span></small></a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </section>
    
    <section class="publicity container-fluid">
        <section class="testimonials">
            <h2>Testimonials</h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Stacey Friend</h3>
                </div>
                <div class="panel-body">
                    <img class="img-circle" src="images/staceyfriend.jpg" />
                    <p>“Tejai is a highly efficient, hard working, hands-on individual. Her ability to manage numerous complex operations, while simultaneously maintaining the highest standards and discretion for her clients is by far an attribution to her professionalism.” — Stacey Friend, Estate Manager at Greenwoods Trust LLC</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Diane Halfman</h3>
                </div>
                <div class="panel-body">
                    <img class="img-circle" src="images/dianehalfman.jpg" />
                    <p>“I always knew I could rely on Tejai and trust her implicitly, she is level headed with endless reserve, initiative, follow-through and “take charge” energy which would be a valuable asset to any organization.” – <a href="http://dianehalfman.typepad.com/my-lifestyle-organizer/">Diane Halfman</a>, Coach, Consultant at The Ultimate Game of Life, an Edutainment Co.</p>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Michele Presley</h3>
                </div>
                <div class="panel-body">
                    <img class="img-circle" src="images/michelepresley.jpg" />
                    <p>“I value Tejai’s intelligence, integrity, loyalty and work ethic, not to mention her unfailing perseverence in the face of adversity.” – Michele Presley, Sales & Marketing Exec at JumpstartMD</p>
                </div>
            </div>
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
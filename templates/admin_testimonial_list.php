<main class="admin col-md-10 col-md-offset-1">  
   <section class="container-fluid">
        <h2>Testimonials</h2>
            
        <!-- Status Success/Error Messages -->
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
            Testimonial successfully deleted.
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
            Sorry, something went wrong. Please try deleting the testimonial again.
            </div>
        <?php endif ?>

        <p>You have <?=$testimonialCount?> testimonials</p>

        <?php foreach($testimonialList as $testimonial): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?=$testimonial["name"]?></h4>
                    <a href="<?=Route::rewrite_url('/admin/testimonials/edit/'.$testimonial["id"])?>" type="button" class="btn btn-default">Edit</a>
                    <button class="btn btn-default delete" type="button">Delete</button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger delete-confirm hide">
                        Are you sure you want to delete this testimonial? 
                        <a class="btn btn-danger" href="<?=Route::rewrite_url('/api/testimonials/delete/'.$testimonial["id"])?>">Yes</a>
                        <button class="btn btn-default delete-cancel">No</button>
                    </li>
                    
                    <li class="list-group-item">
                        Title: <?=$testimonial["title"]?>
                    </li>
                    
                    <li class="list-group-item">
                        Link (optional): 
                        <?php
                            if(empty($testimonial["link"])){
                                print("No link provided.");
                            } else{
                                print("<a href='" . $testimonial["link"] . "'>" . $testimonial["link"] . "</a>");
                            }
                        ?>
                    </li>

                    <li class="list-group-item">
                        Quote: "<?=$testimonial["quote"]?>"
                    </li>
                    
                    <li class="list-group-item">
                        Image: <img class="media-object" src="<?=Route::rewrite_url("/uploads/testimonials/" . $testimonial["image"])?>" alt="<?=$testimonial["name"]?>">
                    </li>
                </ul>
            </div>
        <?php endforeach ?>

        <div class="btn-wrapper">
            <a href="<?=Route::rewrite_url('/admin/testimonials/add')?>" type="button" class="btn btn-default">
                Add new testimonial
            </a>
        </div>
    </section>
</main>
<main class="admin col-md-10 col-md-offset-1">  
   <section class="container-fluid">
        <h2>Services</h2>
            
        <!-- Status Success/Error Messages -->
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
            Service successfully deleted.
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
            Sorry, something went wrong. Please try deleting the service again.
            </div>
        <?php endif ?>

        <p>You have <?=$serviceCount?> services</p>

        <?php foreach($serviceList as $service): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?=$service["name"]?></h4>
                    <a href="<?=Route::rewrite_url('/admin/services/edit/'.$service["id"])?>" type="button" class="btn btn-default">Edit</a>
                    <button class="btn btn-default delete" type="button">Delete</button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger delete-confirm hide">
                        Are you sure you want to delete this service? 
                        <a class="btn btn-danger" href="<?=Route::rewrite_url('/api/services/delete/'.$service["id"])?>">Yes</a>
                        <button class="btn btn-default delete-cancel">No</button>
                    </li>
                    
                    <li class="list-group-item">
                        Name: <?=$service["name"]?>
                    </li>

                    <li class="list-group-item">
                        full_description: "<?=$service["full_description"]?>"
                    </li>

                    <li class="list-group-item">
                        Image: <img class="media-object" src="<?=Route::rewrite_url($service["image"])?>" alt="<?=$service["name"]?>">
                    </li>

                    <li class="list-group-item">
                        link: <?=$service["link"]?>
                    </li>
                </ul>
            </div>
        <?php endforeach ?>

        <div class="btn-wrapper">
            <a href="<?=Route::rewrite_url('/admin/services/add')?>" type="button" class="btn btn-default">
                Add new service
            </a>
        </div>
    </section>
</main>
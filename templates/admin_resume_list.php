<main class="admin col-md-10 col-md-offset-1">  
   <section class="container-fluid">
        <h2>Resumes</h2>
            
        <!-- Status Success/Error Messages -->
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
            Resume successfully deleted.
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
            Sorry, something went wrong. Please try deleting the resume again.
            </div>
        <?php endif ?>

        <p>You have <?=$resumeCount?> resumes</p>

        <?php foreach($resumeList as $resume): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?=$resume["name"]?></h4>
                    <button class="btn btn-default delete" type="button">Delete</button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger delete-confirm hide">
                        Are you sure you want to delete this resume? 
                        <a class="btn btn-danger" href="<?=Route::rewrite_url('/api/resumes/delete/'.$resume["id"])?>">Yes</a>
                        <button class="btn btn-default delete-cancel">No</button>
                    </li>

                    <li class="list-group-item">
                        Contact info: <?=$resume["phone"]?>, <?=$resume["email"]?>
                    </li>

                    <li class="list-group-item">
                        Resume: <a href="<?=Route::rewrite_url('/uploads/resumes/'.$resume["filename"])?>" target="_blank"><?=$resume["filename"]?></a>
                    </li>

                    <li class="list-group-item">
                        <span style="font-style: italic">How would you be an asset to Luxe Managers?</span>
                        <br />
                        <?=$resume["message"]?>
                    </li>
                </ul>
            </div>
        <?php endforeach ?>
    </section>
</main>
<main class="admin col-md-10 col-md-offset-1">  
   <section class="container-fluid">
        <h2>Press</h2>
            
        <!-- Status Success/Error Messages -->
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
            Press item successfully deleted.
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
            Sorry, something went wrong. Please try deleting the press item again.
            </div>
        <?php endif ?>

        <p>You have <?=$pressCount?> press items</p>

        <?php foreach($pressList as $press): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?=$press["publication"]?></h4>
                    <a href="<?=Route::rewrite_url('/admin/press/edit/'.$press["id"])?>" type="button" class="btn btn-default">Edit</a>
                    <button class="btn btn-default delete" type="button">Delete</button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger delete-confirm hide">
                        Are you sure you want to delete this press item? 
                        <a class="btn btn-danger" href="<?=Route::rewrite_url('/api/press/delete/'.$press["id"])?>">Yes</a>
                        <button class="btn btn-default delete-cancel">No</button>
                    </li>
                    
                    <li class="list-group-item">
                        Publication: <?=$press["publication"]?>
                    </li>

                    <li class="list-group-item">
                        Content: <?=$press["content"]?>
                    </li>

                    <li class="list-group-item">
                        Internal URL: <?=$press["urlname"]?>
                    </li>

                    <li class="list-group-item">
                        Primary Image:
                        <img class="media-object" src="<?=Route::rewrite_url("/uploads/press/" . $press["primary_image"])?>" alt="<?=$press["publication"]?>" />
                    </li>

                    <?php if(!empty($press["secondary_image"])): ?>
                        <li class="list-group-item">
                            Secondary Image:
                            <img class="media-object" src="<?=Route::rewrite_url("/uploads/press/" . $press["secondary_image"])?>" alt="<?$press["secondary_image"]?>" />
                        </li>
                    <?php endif ?>

                    <?php if(!empty($press["link"])): ?>
                        <li class="list-group-item">
                            External Link: 
                            <a href="<?=$press["link"]?>">
                                <?=$press["link"]?>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        <?php endforeach ?>

        <div class="btn-wrapper">
            <a href="<?=Route::rewrite_url('/admin/press/add')?>" type="button" class="btn btn-default">
                Add new press item
            </a>
        </div>
    </section>
</main>
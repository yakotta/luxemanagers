<main class="admin col-md-10 col-md-offset-1">  
   <section class="container-fluid">
        <h2>Messages</h2>
            
        <!-- Status Success/Error Messages -->
        <?php if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
            <div class="alert alert-success" role="alert">
            Message successfully deleted.
            </div>
        <?php endif ?>
        
        <?php if(isset($_GET["status"]) && $_GET["status"] == "fail"): ?>
            <div class="alert alert-danger" role="alert">
            Sorry, something went wrong. Please try deleting the message again.
            </div>
        <?php endif ?>

        <p>You have <?=$messageCount?> messages</p>

        <?php foreach($messageList as $message): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?=$message["name"]?></h4>
                    <button class="btn btn-default delete" type="button">Delete</button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger delete-confirm hide">
                        Are you sure you want to delete this message? 
                        <a class="btn btn-danger" href="<?=Route::rewrite_url('/api/messages/delete/'.$message["id"])?>">Yes</a>
                        <button class="btn btn-default delete-cancel">No</button>
                    </li>

                    <li class="list-group-item">
                        Contact info: <?=$message["phone"]?>, <?=$message["email"]?>
                        <br />
                        Preference: <?=$message["preference"]?>
                    </li>

                    <li class="list-group-item">
                        <?=$message["message"]?>
                    </li>
                </ul>
            </div>
        <?php endforeach ?>
    </section>
</main>
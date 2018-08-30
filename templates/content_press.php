<main class="col-md-10 col-md-offset-1">
    <h2>Press</h2>
    <div class="row">
        <?php foreach($pressList as $press){
            print(Render::template("templates/block_press.php", [
                "press" => $press
            ]));
        }?>
    </div>
</main>
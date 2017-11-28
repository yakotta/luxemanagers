<main class="col-md-10 col-md-offset-1">
    <h2>Press</h2>
    <div class="press-block">
        <?php foreach($pressList as $press){
            print(render_template("templates/block_press.php", [
                "press" => $press
            ]));
        }?>
    </div>
</main>
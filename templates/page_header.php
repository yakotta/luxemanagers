<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img class="logo" src="images/luxelogo-small.png" /></a>
            <ul class="nav navbar-nav">
                <li><a href="<?=rewrite_url('/')?>">Home</a></li>
                <li><a href="<?=rewrite_url('/services')?>">Our Services</a></li>
                <li><a href="<?=rewrite_url('/about')?>">About Luxe</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Contact Us: <?=getSiteConfig("phone")?></a></li>
            </ul>
        </div>
    </nav>
</header>
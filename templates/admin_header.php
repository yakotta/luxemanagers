<header class="clearfix">
    <a class="logo" href="<?=Route::rewrite_url('/')?>">
        <img src="<?=Route::rewrite_url("/resources/images/luxelogo-small.png")?>" />
    </a>
    <nav id="menu">
        <ul class="clearfix">
            <li><a class="menuitem" href="<?=Route::rewrite_url('/admin')?>">Admin Home</a></li>
            <li><a class="menuitem" href="<?=Route::rewrite_url('/api/logout')?>">Logout</a></li>
        </ul>
    </nav>
</header>
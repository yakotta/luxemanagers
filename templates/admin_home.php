<main class="admin col-md-10 col-md-offset-1">
    <h2>Welcome, <?=ucwords($user["username"])?></h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Site Config
        </div>
        <ul class="container quadruple-column">
            <li>Update</li>
        </ul>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Services
        </div>
        <ul class="container quadruple-column">
            <li><a href="<?=Route::rewrite_url('/admin/services')?>">List</a></li>
            <li><a href="<?=Route::rewrite_url('/admin/services/add')?>">Add</a></li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Press
        </div>
        <ul class="container quadruple-column">
            <li><a href="<?=Route::rewrite_url('/admin/press')?>">List</a></li>
            <li><a href="<?=Route::rewrite_url('/admin/press/add')?>">Add</a></li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Testimonials
        </div>
        <ul class="container quadruple-column">
            <li><a href="<?=Route::rewrite_url('/admin/testimonials')?>">List</a></li>
            <li><a href="<?=Route::rewrite_url('/admin/testimonials/add')?>">Add</a></li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            Resumes
        </div>
        <ul class="container quadruple-column">
            <li><a href="<?=Route::rewrite_url('/admin/resumes')?>">List</a></li>
        </ul>
    </div>

    <div class="btn-wrapper">
        <a href="<?=Route::rewrite_url('/api/logout')?>" type="button" class="btn btn-default">
            Log out
        </a>
    </div>
</main>
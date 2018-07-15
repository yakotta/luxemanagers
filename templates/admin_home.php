<main class="admin col-md-10 col-md-offset-1">
    <h2>Welcome, [[user]]</h2>
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
            <li>List</li>
            <li>Detail</li>
            <li><a href="<?=Route::rewrite_url('/services/add')?>">Add</a></li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Press
        </div>
        <ul class="container quadruple-column">
            <li>List</li>
            <li>Detail</li>
            <li>Add</li>
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
            <li><span class="strike">Detail</span></li>
            <li><a href="<?=Route::rewrite_url('/admin/testimonials/add')?>">Add</a></li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Messages
        </div>
        <ul class="container quadruple-column">
            <li>List</li>
            <li>Detail</li>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Resumes
        </div>
        <ul class="container quadruple-column">
            <li>List</li>
            <li>Detail</li>
        </ul>
    </div>
</main>
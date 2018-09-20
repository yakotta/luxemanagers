<form method="post" action="<?=Route::rewrite_url('/api/login')?>">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="username">Username</span>
            <input type="text" name="username" class="form-control" aria-describedby="username" required />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="password">Password</span>
            <input type="password" name="password" class="form-control" aria-describedby="password" required />
        </div>
    </div>

    <div class="btn-wrapper">
        <div class="submitbutton">
            <button type="submit" class="btn btn-default">Log In</button>
        </div>
    </div>
</form>
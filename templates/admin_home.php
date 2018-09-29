<main class="admin col-md-10 col-md-offset-1">
    <h2>Welcome, <?=ucwords($user["username"])?></h2>

    <div class="panel panel-default">
        <div class="panel-heading">
            Recent Messages
        </div>
        <table class="table">
            <tbody>
                <?php foreach($messageList as $message): ?>
                    <tr>
                        <td><?=$message["name"]?></td>
                        <td><?=$message["message"]?></td>
                        <td>
                            <div class="btn-wrapper">
                                <a href="<?=Route::rewrite_url('/admin/messages/'.$message["id"])?>" type="button" class="btn btn-default">
                                    See more
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <td colspan="3">
                    <a href="<?=Route::rewrite_url('/admin/messages')?>" type="button" class="btn btn-default">
                        See all
                    </a>
                </td>
            </tfoot>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Applicants
        </div>
        <table class="table">
            <tbody>
                <?php foreach($resumeList as $resume): ?>
                    <tr>
                        <td><?=$resume["name"]?></td>
                        <td><?=$resume["message"]?></td>
                        <td><a href='<?=Route::rewrite_url('/uploads/resumes/'.$resume["filename"])?>'>resume</a></td>
                        <td>
                            <div class="btn-wrapper">
                                <a href="<?=Route::rewrite_url('/admin/resumes/'.$resume["id"])?>" type="button" class="btn btn-default">
                                    See more
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <td colspan="4">
                    <a href="<?=Route::rewrite_url('/admin/resumes')?>" ype="button" class="btn btn-default">
                        See all
                    </a>
                </td>
            </tfoot>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Site Content
        </div>
        <table class="table">
            <tr>
                <td>Business info</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/business')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Front page sliders</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/sliders')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Services</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/services')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Testimonials</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/testimonials')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Press</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/api/press')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>
        <table class="table">
            <?php foreach($userList as $item): ?>
                <tr>
                    <td><?=$item["username"]?></td>
                    <td><?=$item["email"]?></td>
                    <td><?=$item["is_enabled"] ? "active":"disabled"?></td>
                    <td>
                        <div class="btn-wrapper">
                            <a href="<?=Route::rewrite_url('/admin/user/'.$item["id"])?>" type="button" class="btn btn-default">
                                Manage
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Site Configuration
        </div>
        <table class="table">
            <tr>
                <td>Site config</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/site-config')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Database migrations</td>
                <td>
                    <div class="btn-wrapper">
                        <a href="<?=Route::rewrite_url('/admin/migrations')?>" type="button" class="btn btn-default">
                            Manage
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="btn-wrapper">
        <a href="<?=Route::rewrite_url('/api/logout')?>" type="button" class="btn btn-default">
            Log out
        </a>
    </div>
</main>
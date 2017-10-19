<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Luxe Luxury Lifestyle Managers</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Generated by: https://realfavicongenerator.net -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=rewrite_url("/resources/favicons/apple-touch-icon.png")?>" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?=rewrite_url("/resources/favicons/favicon-32x32.png")?>" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?=rewrite_url("/resources/favicons/favicon-16x16.png")?>" />
        <link rel="manifest" href="<?=rewrite_url("/resources/favicons/manifest.json")?>" />
        <link rel="mask-icon" href="<?=rewrite_url("/resources/favicons/safari-pinned-tab.svg")?>" color="#5bbad5" />
        <link rel="shortcut icon" href="<?=rewrite_url("/resources/favicons/favicon.ico")?>" />
        <meta name="apple-mobile-web-app-title" content="Luxe Managers" />
        <meta name="application-name" content="Luxe Managers" />
        <meta name="msapplication-config" content="<?=rewrite_url("/resources/favicons/browserconfig.xml")?>" />
        <meta name="theme-color" content="#ffffff" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?=rewrite_url('/resources/luxe.css')?>" />
        <link rel="stylesheet" type="text/css" href="<?=rewrite_url('/resources/luxe-desktop.css')?>" media="screen and (min-width: 768px)" />
    </head>
    
    <body>
        <?=render_template("templates/page_header.php")?>
        
        <div class="content">
            <?=$content?>
        </div>
        
        <?=render_template("templates/page_footer.php")?>
         
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="<?=rewrite_url('/resources/luxe.js')?>" type="text/javascript"></script>
    </body>
</html>
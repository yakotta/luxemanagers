<p>Someone has submitted their resume using the employment form on luxemanagers.com. Their details are printed for you below:</p>

<ul>
    <li>Name: <?=$name?></li>
    <li>Email: <?=$email?></li>
    <li>Phone: <?=$phone?></li>
    <li>Resume: <a href="<?=$reume_url?>">click to view</a></li>
</ul>

<p><i>How would <?=$name?> be an asset to Luxe Managers?</i></p>
<p><?=$message?></p>

<?php
    $datetime = new DateTime("now",new DateTimeZone('America/Los_Angeles'));
?>

This email was generated at <?=$datetime->format("g:i a")?> on <?=$datetime->format("m/d/Y")?>.

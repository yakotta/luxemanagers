<p>Someone has contacted you using the contact form on luxemanagers.com. Their details are printed for you below:</p>

<ul>
    <li>Name: <?=$_POST["name"]?></li>
    <li>Email: <?=$_POST["email"]?></li>
    <li>Phone: <?=$_POST["phone"]?></li>
    <li>Contact preference: <?=$_POST["preference"]?></li>
</ul>

<p><?=$_POST["name"]?> sent the following message:</p>
<p><?=$_POST["message"]?></p>

<?php
    // now always refers to the current time in UTC/GMT
    // the second parameter, is an object referencing your timezone
    // format is identical to the formatting in the date function you used before
    $datetime = new DateTime("now",new DateTimeZone('America/Los_Angeles'));
?>

This email was generated at <?=$datetime->format("g:i a")?> on <?=$datetime->format("m/d/Y")?>.
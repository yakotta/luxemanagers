<p>Dear <?=$_POST["name"]?>,</p>

<p>
    Thank you for contacting LUXE Luxury Lifestyle Managers! We have received your 
    message and will reach out to you by <?=$_POST["preference"]?>.
</p>

<p>
    The email you provided was <?=$_POST["email"]?> and your phone number was 
    <?=$_POST["phone"]?>. If either of these is incorrect, please send us another 
    message <a href="luxemanagers.com/contact">through our website</a>.
</p>

<p>For your reference, the message you sent is printed below:</p>

<p><?=$_POST["message"]?></p>

<p>Best,<br />LUXE Managers</p>
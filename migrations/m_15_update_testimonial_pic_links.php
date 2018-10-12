<?php
$db->query("
    update testimonials 
    set image = replace(image, '/resources/testimonials/', '') 
    where image like '/resources/testimonials/%'
");

return true;
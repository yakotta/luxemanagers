<?php
$db->query("
    update services 
    set link = replace(link, '/services/', '') 
    where link like '/services/%'
");

return true;
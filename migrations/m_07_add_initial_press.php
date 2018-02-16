<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

// truncate will delete all the data in the table and reset the "auto_increment" back to zero
$db->query("truncate press");

$content=<<<CONTENT
    UHNW Private Service Management is a truly unique. LUXE Lifestyle Experts know that happiness 
    is a direction, not a destination. The best service requires a solid executable system for 
    service delivery that is specialized for each unique environment and individuals within.<br/>
    <br/>
    We make magic happen, so you don't have to. Your wish is truly our command. 
    Need more than three? Expect Magic. Live Life LUXE.
CONTENT;

$query=<<<QUERY
  insert into press set 
      publication = "Luxury Home Magazine",
      content = "$content",
      urlname = "luxury-home-magazine",
      marketing_image = "/resources/press/luxe_luxury_home_magazing.png",
      publication_image = "/resources/press/luxury_home_magazine.jpg",
      link = "http://www.luxuryhomemagazine.com/siliconvalley/online/#?page=58"
QUERY;

$db->query($query);

return true;
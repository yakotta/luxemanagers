<?php
// truncate will delete all the data in the table and reset the "auto_increment" back to zero
$db->query("truncate press");

$content=<<<CONTENT
   Luxury Home Magazine Silicon Valley has featured LUXE Luxury Lifestyle Managers! Luxury Home
   Magazine is North America’s premiere network of market-specific magazines featuring luxury 
   homes and services. They’ve acknowledged our genie-like ability to make all our clients’ 
   wishes come true&mdash;even when there’s more than three wishes. 
CONTENT;

$query=<<<QUERY
  insert into press set 
      publication = "Luxury Home Magazine",
      content = "$content",
      urlname = "luxury-home-magazine",
      marketing_image = "luxury_home_magazine_cover.png",
      publication_image = "luxury_home_magazine_feature.png",
      link = "https://issuu.com/luxuryhomemagazine/docs/lhmsvp7.5online/58"
QUERY;

$db->query($query);

return true;
<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$db->query("
    alter table press
        change marketing_image primary_image varchar(255),
        change publication_image secondary_image varchar(255)
");

$content=<<<CONTENT
    LUXE Luxury Lifestyle Managers has been awarded the Best of the Bay Area Awared 2015! We
    have been recognized in the Domestic Service Management category for out exceptional customer
    service. LUXE provides a truly unique service within the Bay Area, and we look forward to 
    meeting and exceeding the needs of all our clients for years to come. 
CONTENT;

$query=<<<QUERY
  insert into press set 
      publication = "Best of the Bay Area",
      content = "$content",
      urlname = "best-of-the-bay-area-2015",
      primary_image = "bay_area_award_program.jpg",
      featured = 1
QUERY;

$db->query($query);

$content=<<<CONTENT
    LUXE Luxury Lifestyle Managers has been accredited by the Better Business Bureau. The BBB
    has recognized our integrity and performance with out clients. LUXE  has an exceptional track
    record with all our clients&mdash;we deliver timely results in accordance with the BBB’s
    exacting standards, and we look forward to continuing to serve the Silicon Valley community.  
CONTENT;

$query=<<<QUERY
  insert into press set 
      publication = "Better Business Bureau",
      content = "$content",
      urlname = "better-business-bureau",
      primary_image = "bbb-logo.png",
      link = "https://www.bbb.org",
      featured = 1
QUERY;

$db->query($query);

return true;


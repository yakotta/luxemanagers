<?php
if( !is_array($_SESSION) ||
    !array_key_exists("authenticated", $_SESSION) ||
    $_SESSION["authenticated"] == false)
{
    print("<p>You're not allowed in here. Go away.</p>");
    return false;
}

$db = Database::connect();

$full_description=<<<FULL_DESCRIPTION
    <p>
        Whether you’re hosting a small soirée or throwing the biggest bash of the year, any day 
        you come together with your loved ones is an occasion to celebrate. When you want 
        everything to be just perfect, go Luxe. Our detail-oriented staff will handle everything
        according to your exact specifications, so you can host your event stress-free. You 
        may even feel like a guest at your own party, able to enjoy yourself without sweating 
        the details of hosting. You really can have your cake and eat it too.<br />
        <br />
        When Luxe is on your party planning team, you get:
    </p>
    <ul>
        <li>Event planning from start to finish and same-day management for both private and corporate events. We can be your main event planners, or we can team up with a dedicated event-planning company.</li>    
        <li>Reliable on-site presence. We’ll surpervise set-up and tear-down, and we’ll be on-hand for the duration of your event to smooth out any suprises.</li>
        <li>Managing guest lists and RSVPs.</li>
        <li>Venue scouting and booking.</li>
        <li>Party rentals including tables and chairs, linens, florals, coffee stands, balloon art, arcade games, sanitation equipment, and more.</li>
        <li>Arranging entertainment, including musicians, speakers photobooths, kid-friendly activities, and more. We’ve done everything from private telescope vieweings at nearby Observatories to artifical snow on Christmas Day.</li>
        <li>Menu development with caterers and cake makers.</li>
        <li>Contracting safety personnel, including secruity guards, bouncers, lifeguards, and on-call emergency responders, depending on your event.</li>
        <li>Sourcing and managing vendors.</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 8, 
      name = 'Party and Event Planning', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/uploads/services/event-planning.jpg',
      link = 'event-planning'
");

return true;
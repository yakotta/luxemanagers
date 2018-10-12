<?php
$full_description=<<<FULL_DESCRIPTION
    <p>
        At Luxe, we understand that the best candidate for the job is often someone who does ordinary 
        things extraordinarily well. We apply project management skills to help our corporate clients 
        around the world create the teams of their dreams. Our keen understanding of how an efficient staff 
        functions enables us to clearly assess the strengths and weaknesses of corporate support staff, 
        and to build and train teams that  	help great companies perform even better.<br/>
        <br/>
        Luxe’s corporate services include, but aren’t limited to:
    </p>
    <ul>
        <li>Complete office management.</li>
        <li>Training, assessment, and development programs for executive assistants.</li>
        <li>Creation or revision and maintenance of CEO and executives’ roadmap binders, including the listing of all daily office preferences and requirements.</li>
    </ul>	
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 7, 
      name = 'Corporate Support', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/uploads/services/corporate-support.jpg',
      link = '/services/corporate-support'
");

return true;
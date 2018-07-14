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
$db->query("truncate services");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Luxe domestic staffing and placement is unlike any other domestic
        staffing service. We have worked in private homes directly and understand
        the ins and outs of every position in a private home setting. We are
        able to draw on our expert firsthand knowledge to vet and select the
        best candidates for each position we staff. It is so important to make
        sure that there is a cohesive fit between staff and the household. We
        make sure each position is tailored to the unique needs and desires of
        every household, and then train, mentor, and evaluate staff members
        through their entire candidacy and into their placement to ensure a
        successful fit.<br/>
        <br/>
        Some of the standard household placements Luxe specializes in incude:
    </p>
    <ul>
        <li>Accountants</li>
        <li>Administrators</li>
        <li>Baby Nurses</li>
        <li>Bookkeepers</li>
        <li>Butlers</li>
        <li>Chefs and Cooks</li>
        <li>Childcare Staff</li>
        <li>Childhood Development Staff</li>
        <li>Drivers/Valets</li>
        <li>Estate Managers</li>
        <li>Estate Staff</li>
        <li>Executive Chef Contracts</li>
        <li>Executive Chef Staff</li>
        <li>Executive Housekeepers</li>
        <li>Family Assistants</li>
        <li>Household Assistants</li>
        <li>Household Managers</li>
        <li>Household Organizers</li>
        <li>Household Staff</li>
        <li>Housekeeper/Cooks</li>
        <li>Housekeepers</li>
        <li>Housemen/Handymen</li>
        <li>Landscapers</li>
        <li>Laundresses</li>
        <li>Mother’s Helpers</li>
        <li>Nannies</li>
        <li>Parent Helpers</li>
        <li>Personal and Executive Assistants</li>
        <li>Private Office Staff</li>
        <li>Security Staff</li>
        <li>Teachers</li>
        <li>Tutors</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 1, 
      name = 'Domestic Staffing and Placement', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/domestic.jpg',
      link = '/services/domestic-staffing-and-placement'
");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Managing an estate is complex enough to feel like a full-time job. Enter Luxe’s comprehensive 
        estate management services. From managing staff to properties, we anticipate needs and solve 
        problems, family by family, property by property, room by room. We have the insight to help maximize 
        your estate today and the foresight to keep it running efficiently for years to come.<br/>
        <br/>
        As your full-service estate managers, Luxe can:
    </p>
    <ul>
        <li>Supervise and manage all estate activities and functions in an effective and efficient manner.</li>
        <li>Hire and manage household staff positions and security personnel, including new and existing full-time, part-time, and seasonal staff members.</li>
        <li>Provide training, development, and mentoring to staff members to ensure success in their positions and ultimately complete client satisfaction.</li>
        <li>Conduct quarterly or annual performance reviews.</li>
        <li>Coordinate daily operations among household staff in both single- and multi-property estates.</li>
        <li>Source and supervise outside vendors for specialized jobs or tasks.</li>
        <li>Create, implement, and manage household manuals, task lists, maintenance calendars, itemized inventories, and budgets, including cost projections and forecasting for staffing support, and estate and automobile maintenance.</li>
        <li>Ensure the household is properly supplied via inventory-taking, record-keeping, and purchasing. We make sure that everything is accounted for, from food to furnishings and dinnerware to décor.</li>
        <li>Maintain general facility readiness at all properties for the client and or their guests to ensure that all properties are arrival-ready as needed. This includes managing and coordinating the appropriate pre- and post-residency occupation procedures for all properties and locations.</li>
        <li>Create and execute weekly, monthly and/or annual cleaning, landscaping, and maintenance planning.</li>
        <li>Schedule maintenance and care procedures for all estate equipment, systems, appliances, structures, furnishings, fine art, antiquities for primary and seasonal residences.</li>
        <li>Arrange for upgrades to smart home technology and multi-system integration, including home automation systems such as Crestron, AMX, and Lutron.</li>
        <li>Implement ecologically-minded landscaping and the proper care and maintenance of organic and/or biodynamic and biosustainable gardens and vineyards.</li>
        <li>Coordinate landscaping and property maintenance for the proper care of courts, gardens, wells, ponds, fountains, intelligent watering systems, equestrian facilities.</li>
        <li>Provide wardrobe styling, purchasing, maintenance, cleaning and repairs.</li>
        <li>Ensure the safety, privacy, comfort, and overall well-being, the family and all guests.</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 2, 
      name = 'Domestic, Estate, and Household Managment', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/household-management.jpg',
      link = '/services/estate-household-management'
");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Wherever you go, go Luxe. Our lifestyle managers have a deep appreciation and understanding 
        of luxury travel and put in the work necessary to ensure all your travels are smooth 
        sailing. Whether it’s for business or pleasure, we handle all the behind-the-scenes details 
        so that you can travel in effortless style.<br/>
        <br/>
        Some of the travel services Luxs provides are:
    </p>
    <ul>
        <li>All-inclusive private air and vessel management: crews, maintenance, catering coordination, regulatory compliance, and more.</li>
        <li>Luxury air travel, yachting, and helicopter transfers.</li>
        <li>Advance arrival set ups, departure transfers, and transitions.</li>
        <li>Travel companions and personal assistants to ensure every detail is addressed and modified over the course of the journey.</li>
        <li>Luxury tours and accommodations, everything from private island villas to fully-catered wilderness glamping.</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 3, 
      name = 'Travel, Private Air, and Vessel Management', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/private-air-vessel-management.jpg',
      link = '/services/travel-private-air-and-vessel-management'
");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Make moving hassle-free with Luxe. We’ll handle every step of your relocation, from packing, 
        sorting, staging, storage, and delivery, to setup, installation, and full property-wide 
        organization for move-ins and move-outs. For international moves we take care of insurance 
        certificates, transfer documents, import taxes, customs and crate tracking, contracts, 
        art and antiquity relocation, and the same full-service delivery, setup, and organization. 
        Our licensed and bonded vendors understand what’s required to  	successfully move large estates 
        and will meet even the highest expectations. Even the most complex relocation projects, for both 
        private and corporate clients, will be taken care of with skill and expertise.<br/>
        <br/>
        Luxe provides your relocation with:
    </p>
    <ul> 	
        <li>Packing and storage services, as well as pet and vehicle transportation.</li> 	
        <li>Coordination of white glove delivery services, with every box individually numbered, labeled by room and location, indexed, and photographed for storage or move-in organization.</li>
        <li>International transport of crated items, including scheduling and tracking from pickup to setup, with all documentation handled for you.</li>
        <li>Facilitation and management of design, modification, and renovation teams. </li>
        <li>Personal tours and familiarization with your new city.</li>
        <li>Facilitation of smart home implementation and audio/video/home theater installation services.</li>
        <li>Continuous education and tutoring support.</li>
    </ul>
FULL_DESCRIPTION;


$db->query("
    insert into services set 
      id = 4, 
      name = 'Domestic and International Relocations', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/relocation.jpg',
      link = '/services/relocations'
");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Sit back, relax, and raise a glass to a stress-free construction project. At Luxe we combine superior 
        project management skills with a strong, established network of architectural, engineering, design, 
        and construction vendors to meet or beat deadlines, budgets, and expectations. Whether it’s new 
        construction or renovations to existing residential or commercial properties, we’re here to be your 
        unwavering advocate to fulfill your every need every step of the way.
    </p>
    
    <p>Luxe will be your:</p>
    <ul>
        <li>Client representative on ongoing construction renovations, general maintenance, repairs, and upgrades.</li>
        <li>Principal contact for design and build team members, including architects, engineers, designers, project consultants vendors and onsite staff. Direct all questions to us and enjoy your peace of mind.</li>
    </ul>
    
    <p>Luxe will also:</p>
    <ul>
        <li>Hire, train, mentor, and evaluate full and part-time staff and subcontractors, as well as provide continuous performance review, quality control, cost analysis, and value engineering.</li>
        <li>Manage vendors and subcontractors from bid solicitation, comparison, and selection, all the way through construction completion. We work on both project-specific contracts as well as long-term estate and household maintenance.</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 5, 
      name = 'Residential and Commercial Construction Project Management - Owners Representative', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/construction-management.jpg',
      link = '/services/construction-project-management'
");

$full_description=<<<FULL_DESCRIPTION
    <p>
        Luxe clients know that exceptional service is always just a phone call away and that no request 
        is too small or too complicated. We take care of your to-do lists with style, grace, and skill. 
        At the end of the day, there are no excuses—just results.<br/>
        <br/>
        Let Luxe take care of your:
    </p>
    <ul>
        <li>Personal Shopping and errands.</li>
        <li>Household inventory and organization.</li>
        <li>Gift purchasing and personal delivery.</li>
        <li>Weekly, bi-weekly, or monthly fresh floral arrangements.</li>
        <li>Estate purchases.</li> 
        <li>Anniversary, holiday, and birthday planning and reminders.</li>
        <li>Holiday dinner arrangements, from dinner parties to nights out.</li>
        <li>Party and event planning, including catering, menu design, and decor planning for everything from intimate gatherings to elaborate full service events.</li>
        <li>Holiday design schemes and decorations, such as for Halloween, Thanksgiving, Christmas and Hanukkah, or any other holiday or celebration.</li>
    </ul>
FULL_DESCRIPTION;

$db->query("
    insert into services set 
      id = 6, 
      name = 'Private Concierge Services', 
      short_description = NULL, 
      full_description = '$full_description',
      image = '/resources/services/private-concierge.jpg',
      link = '/services/private-concierge'
");

return true;
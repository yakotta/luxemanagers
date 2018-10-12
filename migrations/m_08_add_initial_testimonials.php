<?php
// truncate will delete all the data in the table and reset the "auto_increment" back to zero
$db->query("truncate testimonials");

$query=<<<QUERY
  insert into testimonials set 
      name = "Stacey Friend",
      quote = "Tejai is a highly efficient, hard working, hands-on individual. Her ability to manage numerous complex operations, while simultaneously maintaining the highest standards and discretion for her clients is by far an attribution to her professionalism.",
      title = "Estate Manager at Greenwoods Trust LLC",
      link = null,
      image = "/resources/testimonials/staceyfriend.jpg"
QUERY;

$db->query($query);

$query=<<<QUERY
  insert into testimonials set 
      name = "Diane Halfman",
      quote = "I always knew I could rely on Tejai and trust her implicitly, she is level headed with endless reserve, initiative, follow-through and 'take charge' energy which would be a valuable asset to any organization.",
      title = "Coach, Consultant at The Ultimate Game of Life, an Edutainment Co.",
      link = "http://dianehalfman.typepad.com/my-lifestyle-organizer/",
      image = "/resources/testimonials/dianehalfman.jpg"
QUERY;

$db->query($query);

$query=<<<QUERY
  insert into testimonials set 
      name = "Michele Presley",
      quote = "I value Tejai's intelligence, integrity, loyalty and work ethic, not to mention her unfailing perseverence in the face of adversity.",
      title = "Sales & Marketing Exec at JumpstartMD",
      link = null,
      image = "/resources/testimonials/michelepresley.jpg"
QUERY;

$db->query($query);

return true;
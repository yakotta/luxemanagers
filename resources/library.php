<?php

// Preformats the var dump function
function var_dump_pre ($input_variable)
{
    print("<pre>");
    var_dump($input_variable);
    print("</pre>");
}

// Checks migrations in the database
function check_migration($m)
{
    $db = connect();

    $m = str_replace($_SERVER["DOCUMENT_ROOT"], "", $m);

    $result = $db->query("select filename from migrations where filename = '$m'");

    if($result === false) return false;
    
    if($result->num_rows == 0) return false;
    
    return true;
}

// Adds migrations to the database table 
function add_migration($m)
{
    $db = connect();

    $m = str_replace($_SERVER["DOCUMENT_ROOT"], "", $m);
    
    $db->query("insert into migrations set filename='$m'");
}

function connectDocker()
{
    return [getenv("MYSQL_HOST"),"root","root","luxemanagers",3306];
}

function connectAntimatterServer()
{
    return ["localhost","luxemanagers","j4z132gs63c0y8hr","luxemanagers",3306];
}

function connectMAMP()
{
    return ["localhost","root","root","luxemanagers",3306];
}

function connectC9()
{
    return [getenv('IP'),getenv('C9_USER'),"","luxemanagers",3306];
}

// Creates a database connections
function connect()
{
    // We have to detect where our code is running, so we can use the right database details
    // The database on your MAMP laptop setup is different from my docker setup and my antimatter server setup
    if(getenv("IS_DOCKER")){
        // Jenna, ask me what this list does and I will explain, it looks far more complicated then it is in reality
        list($hostname,$username,$password,$database,$port) = connectDocker();
    }else if(strpos(__DIR__,"clients.antimatter-studios.com") !== false) {
        list($hostname,$username,$password,$database,$port) = connectAntimatterServer();
    }else if(getenv("C9_HOSTNAME")) {
        list($hostname,$username,$password,$database,$port) = connectC9();
    }else {
        list($hostname,$username,$password,$database,$port) = connectMAMP();
    }

    // Create connection
    $db = new mysqli($hostname, $username, $password, $database, $port);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }  
    
    // return the connection to the calling script, so it can be used elsewhere
    return $db;
}

// Renders templates
function render_template($template_name, $template_parameters=[])
{
    if(!is_array($template_parameters)) {
        $template_parameters = [];
        error_log("Template parameters for template '$template_name' were invalid, but I fixed it :* ");
    }

    // extract() creates new variables from array keys, so if an array has a key "field" then it creates a variable $field
    // so this function is very useful for creating lots of variables, from an entire array of keys
    // we do this here, because we do not know if the template being rendered has zero parameters or one hundred
    // so we can easily pass the required parameters using an array, each key being the variable required by the template
    // and each value of the key, being assigned to the variable it will eventually create
    // extract is sometimes seen as "magic", because it "magics" variables into existence
    // however in this case, its extremely useful, because it allows us to pass an array of any number of keys
    // and not deal with the "fiddly details" of knowing what parameters are needed
    extract($template_parameters, EXTR_SKIP);

    // output buffering is very useful, it allows us to grab the entire "output" of a function call, or code block
    // and then put all the printed output into a variable (in this case, $template)
    // this also stops functions from randomly outputting html to the browser, this function acts as a catch-all
    // it catches __EVERYTHING__ and scoops it all up into a buffer
    // then when you call ob_get_clean(), it puts all the content you scooped up, into a variable, nice and simple!
    ob_start();
    include($template_name);
    $template = ob_get_clean();
    
    return $template;
}

// Verifies if an input is a string
function validate_string($input) {
    if (!is_string($input) || empty($input)) return false;

    return true;
}

// Verifies if an input is a valid email address
function validate_email($input) {
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    return true;
}

// Verifies if an input is a valid phone number
function validate_phone($input) {
    // Possible formats: (408) 375-2798, 408-375-2798, 408 375 2798, 4083752798, 408.375.2798

    // A QUICK PRIMER ON REGEX
    // the / and / at the start and end signal that this is a "regex pattern"
    // the ^ at the beginning of the pattern means "it must start here" (there is nothing before this point, this is the start of the string)
    // the $ at the end of the pattern means "it must end here" (there is nothing after this point, this is the end of the string)
    // the [] brackets mean "select a set of characters contained within", e.g. [(] means select a bracket, [0-9] means select any number
    // the {x} where x=3 or 4, means, I want "x" of the previous requested match, in our case [0-9]{3} means, it wants three numbers 123, 345, 567, 001, etc
    // the [)]? the [] and [)] are already explained, but the ? means, it can have 0 or more of them, in other words, its optional
    // the [.\s-] therefore is obvious, including the ? after it, means it wants a literal character "." or a space " ", or a dash/hyphen "-"
    if(preg_match("/^[(]?[0-9]{3}[)]?[.\s-]?[0-9]{3}[.\s-]?[0-9]{4}$/",$input)){
        return true;
    }
    
    return false;
}

// Checks to see if all input parameters exist and are not empty.
function check_parameters (&$source, $parameters=[])
{
    foreach($parameters as $field => $rules)
    {
        if(!array_key_exists($field, $source) || empty($source[$field])){
            if($rules["required"] === true) {
                return $field;
            }
        }
        
        if($rules["type"] === "string") {
            if (validate_string($source[$field]) === false) {
                if($rules["required"] === true) {
                    return $field;
                }
                
                $source[$field] = "";
            }
        }
        
        if($rules["type"] === "email") {
            if (validate_email($source[$field]) === false) {
                if($rules["required"] === true) {
                    return $field;
                }
                
                $source[$field] = "";
            };
        }
        
        if($rules["type"] === "phone") {
            if (validate_phone($source[$field]) === false) {
                if($rules["required"] === true) {
                    return $field;
                }
                
                $source[$field] = "";
            };
        }
    }

    return true;
}

// Redirect function
function redirect($url) {
    header("Location: $url");
    die("Waiting to redirect to '$url'");
}

// Rewrites a requested url based on website location 
function rewrite_url($url) {
    $base = str_replace($_SERVER["DOCUMENT_ROOT"], "", __DIR__);
    $base = str_replace("/resources", "", $base);
    // Make sure the url begins with /
    $rewritten_url = "/".$base.$url;
    // Make sure any double slashes // are replaced with single slash /
    $rewritten_url = str_replace("//","/",$rewritten_url);

    return $rewritten_url;
}

// I stole this code from: https://stackoverflow.com/a/30359808/279147
function match_route($pattern, $callback)
{
    /*
    // Jenna: this function is pretty dammed complicated, please don't attempt to read
    // and understand it alone :) I don't want to confuse you even more with a bunch of
    // stuff which is pretty advanced, I would rather you just use this like a black box
    // until we have time to get through it together
    */

    if(!is_callable($callback)){
        throw new Exception("Callback passed to match route must be valid");
    }

    if(preg_match('/[^-:\/_{}()a-zA-Z\d]/', $pattern)){
        throw new Exception("Route pattern was not valid according to the specification");
    }

    // Turn "(/)" into "/?"
    $pattern = preg_replace('#\(/\)#', '/?', $pattern);

    // Create capture group for ":parameter"
    $allowedParamChars = '[a-zA-Z0-9\_\-]+';
    $pattern = preg_replace(
        '/:(' . $allowedParamChars . ')/',   # Replace ":parameter"
        '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
        $pattern
    );

    // Create capture group for '{parameter}'
    $pattern = preg_replace(
        '/{('. $allowedParamChars .')}/',    # Replace "{parameter}"
        '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
        $pattern
    );

    // Add start and end matching
    $patternAsRegex = "@^" . $pattern . "$@D";

    $continue = true;

    $url = $_GET["url"];

    if(preg_match($patternAsRegex, $url, $matches)) {
        // Get elements with string keys from matches
        $params = array_intersect_key(
            $matches,
            array_flip(array_filter(array_keys($matches), 'is_string'))
        );

        $continue = $callback($params,$url);

        if(!$continue) die();
    }

    return $continue;
}


// Removes all spaces and funky characters from a string
// https://github.com/christhomas/amslib/blob/master/Amslib_String.php#L61
function slugify($string, $slug = '-', $extra = null)
{
	$string		=	slugify_translit($string,$extra);
	$string		=	preg_replace('~[^0-9a-z'.preg_quote($extra, '~').']+~i',$slug, $string);
	//	This part will clean up the end of the filename, before the extension
	//	But only do it if you find more than one part because there was an extension
	$parts		=	explode(".",$string);
	if(count($parts) > 1){
		$extension	=	array_pop($parts);
		$string		=	rtrim(implode(".",$parts),$slug).".$extension";
	}
	return strtolower(trim($string, $slug));
}

// Creates a word slug that strips out all funky characters
function slugify_translit($text,$extra=null)
{
	$text = htmlentities($text, ENT_QUOTES, 'UTF-8');
	$text = preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', $text);
	$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	$text = preg_replace(array('~[^0-9a-z'.preg_quote($extra,'~').']~i', '~[ -]+~'), ' ', $text);
	return trim($text, ' -');
}

// Creates unique file names from input strings
function unique_filename($filename) {
    // Create the prefix to make each filename unique
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
    $prefix = $d->format("Y-m-d_H.i.s.u");
    
    // Create the final filename from all the parts of the uploaded data and the prefix
    return $prefix . "_" . slugify($filename, '-',  '._');
}

// Sends emails from forms
function send_email()
{
    // send an email to website owner AND a confirmation email to user
    /**
     * Here's how an email WOULD be sent if PHP worked
     * 
     * here is the function you use to send an email
     * http://php.net/manual/en/function.mail.php
     * 
     * function sendEmail($to, $from, $subject, $message){
     *      $headers = implode("\n",[
     *          "From: <$from>",
     *          "Reply-To: <$from>",
     *      ]);
     * 
     *      return mail($to, $subject, $message, $headers);
     * }
     * 
     * $to = $source['customerinfo']['email'];
     * $from = 'pinkhamjenna@gmail.com';
     * $subject = 'Your Cadaverous Cupcakes Order';
     * $body = 'hello, mortal';
     * 
     * var_dump(sendEmail($to,$from,$subject,$body));
     */
}

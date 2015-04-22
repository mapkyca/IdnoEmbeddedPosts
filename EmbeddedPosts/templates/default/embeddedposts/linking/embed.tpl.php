<?php


$embedded = '';
$body = Idno\Core\site()->triggerEvent('url/expandintext', ['object' => $vars['object']], $vars['object']->body); 

$whitelist = \Idno\Core\site()->config()->embeddedposts['whitelist'];
$whitelist[] = Idno\Core\site()->config()->url; // Always activate myself

foreach ($whitelist as $knownknowns) { 
    
    $knownknowns = trim($knownknowns);
    
    if ($knownknowns) {
	// Correct slashes
	if ((strpos($knownknowns, 'http://') === false) && (strpos($knownknowns, 'https://') === false)) {
	    $knownknowns = 'http://' . $knownknowns;
	}
	$knownknowns = str_replace('/', '\\/', $knownknowns);
	$knownknowns = str_replace('.', '\.', $knownknowns);

	if (preg_match_all('/'.$knownknowns.'[^\s]+\/?/i', $body, $matches)) {
    
	    foreach ($matches[0] as $m)
		$embedded .= '<div id="sc_'.md5($m).'" class="known-embed" data-url="'.$m.'"></div>';
	}
    }
}

echo $embedded;


 
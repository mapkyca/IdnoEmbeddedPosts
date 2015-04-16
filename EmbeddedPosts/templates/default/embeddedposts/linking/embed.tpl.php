<?php


$embedded = '';
$body = Idno\Core\site()->triggerEvent('url/expandintext', ['object' => $vars['object']], $vars['object']->body); 

foreach ([
    // Always activate myself
    str_replace('/','\\/', Idno\Core\site()->config()->url),
    
    // TODO: Do this in an actually useful way, perhaps via friend discovery?
    
] as $knownknowns) { 
    if (preg_match_all('/'.$knownknowns.'[^\s]+\/?/i', $body, $matches)) {

	foreach ($matches[0] as $m)
	    $embedded .= '<div id="sc_'.md5($m).'" class="known-embed" data-url="'.$m.'"></div>';
    }
}

echo $embedded;


 
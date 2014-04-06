<?php

    header('Content-type: application/json');

    if (!($callback = \Idno\Core\site()->currentPage()->getInput('callback'))) {
        if (!($callback = \Idno\Core\site()->currentPage()->getInput('jsonp'))) {
            if (!($callback = \Idno\Core\site()->currentPage()->getInput('response'))) {
		echo $vars['body'];
	    }
        }
    }
 else {
     echo "$callback({$vars['body']})";
 }
    
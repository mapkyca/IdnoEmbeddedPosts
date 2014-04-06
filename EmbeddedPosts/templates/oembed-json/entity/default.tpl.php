<?php
    // By default, lets just return RAW

    echo json_encode([
	// Basics
	'version' => '1.0',
	
	'title' => $vars['object']->getTitle(),
	'author_name' => $vars['object']->getOwner()->getTitle(),
	'author_url' => $vars['object']->getOwner()->getUrl(),
	
	'provider_url' => \Idno\Core\site()->config()->url,
	
	// Raw extension
	'type' => 'raw',
	
    ]);
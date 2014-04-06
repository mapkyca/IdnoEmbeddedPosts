<?php
    // By default, lets just return RAW

    $width = \Idno\Core\site()->currentPage()->getInput('maxwidth'); if (!$width) $width = 500;
    $height = \Idno\Core\site()->currentPage()->getInput('maxheight'); if (!$height) $height = 300;

    echo json_encode([
	// Basics
	'version' => '1.0',
	
	'title' => $vars['object']->getTitle(),
	'author_name' => $vars['object']->getOwner()->getTitle(),
	'author_url' => $vars['object']->getOwner()->getUrl(),
	
	'provider_url' => \Idno\Core\site()->config()->url,
	
	// Raw extension
	'type' => 'rich',
	'width' => $width,
	'height' => $height
	
    ]);
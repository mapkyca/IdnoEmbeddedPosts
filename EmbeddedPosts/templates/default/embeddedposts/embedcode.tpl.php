<?php

if (!empty($vars['object'])) 
{
    $noschema = $vars['object']->getUUID(); //substr(\Idno\Core\site()->config()->url, 0);
    $noschema = str_replace('http:', '', $noschema);
    $noschema = str_replace('https:', '', $noschema);

    $width = null;
    if (!empty($vars['width']))
	    $width = $vars['width'];
    $height = null;
    if (!empty($vars['height']))
	$height = $vars['height']; 

    if (!$width) $width = 500;
    if (!$height) $height = 200;

    ?>
<iframe src="<?= $noschema; ?>?_t=embed" seamless style="border: 0px; overflow: hidden; width: <?= $width; ?>px; height: <?= $height; ?>px;"></iframe>
<?php 
} 
?>
<?php
$noschema = $vars['object']->getUUID(); //substr(\Idno\Core\site()->config()->url, 0);
$noschema = str_replace('http:', '', $noschema);
$noschema = str_replace('https:', '', $noschema);

$width = $vars['width'];
$height = $vars['height']; 

if (!$width) $width = 500;
if (!$height) $height = 200;

?><iframe src="<?= $noschema; ?>?_t=embed" seamless style="border: 0px; overflow: hidden; width: <?= $width; ?>px; height: <?= $height; ?>px;"></iframe>
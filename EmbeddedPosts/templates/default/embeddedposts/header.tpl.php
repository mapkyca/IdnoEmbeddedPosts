<?php

if (\Idno\Core\site()->currentPage() && \Idno\Core\site()->currentPage()->isPermalink() && $vars['object']) {
  ?>
<link rel="alternate" type="application/json+oembed"
      href="<?= \Idno\Core\site()->config()->url; ?>oembed/?url=<?= urlencode($vars['object']->getUrl());?>&format=json"
      title="<?= $vars['object']->getTitle(); ?>" />
<?php
}
?>
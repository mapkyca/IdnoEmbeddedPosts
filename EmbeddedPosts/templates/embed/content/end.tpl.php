<?php /* @var \Idno\Common\Entity $vars['object'] */ ?>
    <div class="permalink">
        <p>
            <a href="<?=$vars['object']->getURL()?>" rel="permalink" ><time class="dt-published" datetime="<?=date('c',$vars['object']->created)?>"><?=date('c',$vars['object']->created)?></time></a>
            <a href="<?=$vars['object']->getURL()?>#comments" ><?php if ($replies = $vars['object']->countAnnotations('reply')) { echo '<i class="icon-comments"></i> ' . $replies; } ?></a>
            <a href="<?=$vars['object']->getURL()?>#comments" ><?php if ($likes = $vars['object']->countAnnotations('like')) { echo '<i class="icon-thumbs-up"></i> ' . $likes; } ?></a>
            <a href="<?=$vars['object']->getURL()?>#comments" ><?php if ($shares = $vars['object']->countAnnotations('share')) { echo '<i class="icon-refresh"></i> ' . $shares; } ?></a>
            <a href="<?=$vars['object']->getURL()?>#comments" ><?php if ($rsvps = $vars['object']->countAnnotations('rsvp')) { echo '<i class="icon-calendar-empty"></i> ' . $rsvps; } ?></a>
            <?=$this->draw('content/end/links')?>
            <?php

                if (\Idno\Core\site()->currentPage()->isPermalink() && \Idno\Core\site()->config()->indieweb_citation) {

            ?>
            <span class="citation"><?=$vars['object']->getCitation()?></span>
            <?php

                }

            ?>
        </p>
    </div>
    <br clear="all" />
<?php

   
?>

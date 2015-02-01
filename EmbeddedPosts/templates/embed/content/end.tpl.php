<?php 

$replies = $vars['object']->countAnnotations('reply');
    $likes = $vars['object']->countAnnotations('like');
    $mentions = $vars['object']->countAnnotations('mention');
    $has_liked = false;
    if ($like_annotations = $vars['object']->getAnnotations('like')) {
        foreach ($like_annotations as $like) {
            if (\Idno\Core\site()->session()->isLoggedOn()) {
                if ($like['owner_url'] == \Idno\Core\site()->session()->currentUser()->getDisplayURL()) {
                    $has_liked = true;
                }
            }
        }
    }
    $owner = $vars['object']->getOwner();

    if (!empty($owner)) {
		
/* @var \Idno\Common\Entity $vars['object'] */ ?>
    <div class="permalink">
            <p>
                <a href="<?= $owner->getDisplayURL() ?>"><?= htmlentities(strip_tags($owner->getTitle()), ENT_QUOTES, 'UTF-8') ?></a>published this
                <a class="u-url url" href="<?= $vars['object']->getDisplayURL() ?>" rel="permalink">
                    <time class="dt-published"
                          datetime="<?= date('c', $vars['object']->created) ?>"><?= date('c', $vars['object']->created) ?></time>
                </a>
                <?= $this->draw('content/edit') ?>
                <?= $this->draw('content/end/links') ?>
                <?php

                    if (\Idno\Core\site()->currentPage()->isPermalink() && \Idno\Core\site()->config()->indieweb_citation) {

                        ?>
                        <span class="citation"><?= $vars['object']->getCitation() ?></span>
                    <?php

                    }

                ?>
            </p>
        </div>
        <div class="interactions">
            <?php
                if (!$has_liked) {
                    $heart_only = '<i class="icon-star-empty"></i>';
                } else {
                    $heart_only = '<i class="icon-star"></i>';
                }
                if ($likes == 1) {
                    $heart_text = '1 star';
                } else {
                    $heart_text = $likes . ' stars';
                }
                $heart = $heart_only . ' ' . $heart_text;
                if (\Idno\Core\site()->session()->isLoggedOn()) {
                    echo \Idno\Core\site()->actions()->createLink(\Idno\Core\site()->config()->getDisplayURL() . 'annotation/post', $heart_only, array('type' => 'like', 'object' => $vars['object']->getUUID()), array('method' => 'POST', 'class' => 'stars'));
                    ?>
                    <a class="stars" href="<?= $vars['object']->getDisplayURL() ?>#comments"><?= $heart_text ?></a>
                <?php
                } else {
                    ?>
                    <a class="stars" href="<?= $vars['object']->getDisplayURL() ?>#comments"><?= $heart ?></a>
                <?php
                }
            ?>
            <a class="comments" href="<?= $vars['object']->getDisplayURL() ?>#comments"><i class="icon-chat"></i> <?php

                    //echo $replies;
                    if ($replies == 1) {
                        echo '1 comment';
                    } else {
                        echo $replies . ' comments';
                    }

                ?></a>
            <a class="shares" href="<?= $vars['object']->getDisplayURL() ?>#comments"><?php if ($shares = $vars['object']->countAnnotations('share')) {
                    echo '<i class="icon-arrows-cw"></i> ' . $shares;
                } ?></a>
            <a class="shares" href="<?= $vars['object']->getDisplayURL() ?>#comments"><?php if ($rsvps = $vars['object']->countAnnotations('rsvp')) {
                    echo '<i class="icon-calendar-empty"></i> ' . $rsvps;
                } ?></a>
        </div>
        <br clear="all"/>
<?php
}
   
?>

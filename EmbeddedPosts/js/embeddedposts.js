
function idnoGetPostIframe(posturl, x, y) {
    var post = "";
    post += '<iframe src="'+posturl+'?_t=embed&width='+x+'&height='+y+'" seamless style="border: 0px; overflow: hidden; width: '+x+'px; height: '+y+'px;"></iframe>';
    return post;
}

/**
 * Construct a recognisable idno post from json data.
 * 
 * This could probably be done in a more flexible way, but right now I just want something *working*
 */
function idnoGetPostHTMLFromJSON(json_object) {
    
    
    
    
    var entry = json_object.object;
    var owner = json_object.object.actor;
    var post = "";
    
    
    post += '<iframe src="'+entry.url+'?_t=embed" seamless style="border: 0px; overflow: hidden;"><iframe>';
    return post;
    
    post += '<div class="row idno-entry idno-entry-' + entry.objectType + '">';
    post += '<div class="span1 offset1 owner h-card hidden-phone">';
    post += '   <p>';
    post += '        <a href="'+ owner.url +'" class="u-url icon-container"><img class="u-photo" src="'+ owner.image.url +'" /></a><br />';
    post += '        <a href="'+ owner.url +'" class="p-name u-url">'+ owner.displayName +'</a>';
    post += '    </p>';
    post += '</div>';
    post += '<div class="span8 h-entry idno-object idno-content">';
    post += '    <div class="visible-phone">';
    post += '        <p class="p-author author h-card vcard">';
    post += '            <a href="'+ owner.url +'"><img class="u-logo logo u-photo photo" src="'+ owner.image.url+'" /></a>';
    post += '            <a class="p-name fn u-url url" href="'+ owner.url +'">'+ owner.displayName+'</a>';
    post += '            <a class="u-url" href="'+ owner.url +'"></a>';
    post += '        </p>';
    post += '    </div>';
        /*
          TODO: Render sub object details
    
         <?php
            if (($subObject->inreplyto)) {
        ?>
                <div class="reply-text">
                    <?php

                        if (($subObject->replycontext)) {
                        } else {

                            if (!is_array($subObject->inreplyto)) {
                                $inreplyto = [$subObject->inreplyto];
                            } else {
                                $inreplyto = $subObject->inreplyto;
                            }

                            ?>

                                <p>
                                    <i class="icon-reply"></i> Replied to
                                    <?php

                                        $replies = 0;
                                        foreach($inreplyto as $inreplytolink) {
                                            if ($replies > 0) {
                                                if (sizeof($inreplyto) > 2 && $replies < sizeof($inreplyto) - 1) {
                                                    echo ', ';
                                                } else {
                                                    echo ' and ';
                                                }
                                            }
                                            ?>
                                                <a href="<?=$inreplytolink?>" rel="in-reply-to" class="u-in-reply-to">a post on <strong><?=parse_url($inreplytolink, PHP_URL_HOST);?></strong></a><?php
                                            $replies++;
                                        }

                                    ?>:
                                </p>

                            <?php
                        }

                    ?>
                </div>
        <?php
            }

        ?> */
   post += '     <div class="e-content entry-content">'
   post += '         ' + entry.formattedContent; //<?php if (!empty($subObject)) echo $subObject->draw(); ?>
   post += '     </div>';
   post += '     <div class="footer">';
   
   post += '<div class="permalink">';
   post += '     <p>';
   post += '         <a href="'+ entry.url +'" rel="permalink" ><time class="dt-published" datetime="' + entry.published + '">' + entry.published + '</time></a>';
   /*
    
    TODO: Include comment / share counts etc in json
    
    * post += '         <a href="'+ entry.url +'#comments" ><?php if ($replies = $vars['object']->countAnnotations('reply')) { echo '<i class="icon-comments"></i> ' . $replies; } ?></a>
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

            ?>*/
    post += '    </p>';
    post += '</div>';
    post += '<br clear="all" />      ';
    post += '    </div>';
    post += '</div>';
    post += '</div>';

    
    
    return post;
}
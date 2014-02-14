<?php

    $noschema = substr(\Idno\Core\site()->config()->url, 0);
            $noschema = str_replace('http:', '', $noschema);
            $noschema = str_replace('https:', '', $noschema);
            
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!--[if !(lte IE 8)]><!-->
<script type="text/javascript">
  (function(){
         var e = document.createElement('script'); e.type='text/javascript'; e.async = true;
         e.src = '<?= $noschema; ?>IdnoPlugins/EmbeddedPosts/js/embeddedposts.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(e, s);
         <?php /*
         var style = document.createElement('style');
        style.textContent = '@import "' + '<?= $noschema; ?>IdnoPlugins/EmbeddedPosts/css/embeddedposts.css' + '"';
        document.getElementsByTagName("head")[0].appendChild(style); */ ?>
  })();
</script>
<!--<![endif]-->
<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= $vars['object']->getUUID(); ?>?_t=jsonp',
            dataType: 'jsonp',
            success: function(jsondata) {
                $('#<?= $vars['object']->getSlug(); ?>').html(idnoGetPostIframe(jsondata.object.url, 500, 200));
                <?php /* var iframe = $('#<?= $vars['object']->getSlug(); ?> iframe')[0];
                var iframewindow = iframe.contentWindow? iframe.contentWindow : iframe.contentDocument.defaultView;
                
                $('#<?= $vars['object']->getSlug(); ?> iframe').css('height', iframewindow.document.body.scrollHeight); */ ?>
            }
        });
    })
</script>
<div id="<?= $vars['object']->getSlug(); ?>" class="idno-entry-embedded"></div>

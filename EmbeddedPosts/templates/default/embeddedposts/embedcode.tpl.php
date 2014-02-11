
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
    var style = document.createElement('style');
    style.textContent = '@import "' + '<?= \Idno\Core\site()->config()->url; ?>IdnoPlugins/EmbeddedPosts/css/embeddedposts.css' + '"';
    document.getElementsByTagName("body")[0].appendChild(style);
</script>
<script>
            $(document).ready(function(){
                $.ajax({
                    url: '<?= $vars['object']->getUUID(); ?>?_t=jsonp',
                    dataType: 'jsonp',
                    success: function(jsondata){
                        var entry_content = "<div class=\"e-content entry-conten\">" + jsondata.object.object.formattedContent + "</div>";
                        
                        
                        $('#<?= $vars['object']->getSlug(); ?>').html(text);
                    }
                });
            })
        </script>
        <div id="<?= $vars['object']->getSlug(); ?>"></div>

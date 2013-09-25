<div class="idno-embed" data-url="<?= $vars['object']->getUUID(); ?>">
    <?= $vars['object']->draw();
// TODO: Needs to include the activity stream activity view
?>
</div>
<script src="<?= \Idno\Core\site()->config()->url . 'IdnoPlugins/EmbeddedPosts/js/' ?>embeddedposts.js"></script>
<script type="text/javascript">
    var style = document.createElement('style');
    style.textContent = '@import "' + '<?= \Idno\Core\site()->config()->url; ?>IdnoPlugins/EmbeddedPosts/css/embeddedposts.css' + '"';
    document.getElementsByTagName("body")[0].appendChild(style);
</script>
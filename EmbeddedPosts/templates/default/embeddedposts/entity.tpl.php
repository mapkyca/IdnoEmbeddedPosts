<div id="idno-embedcode-<?php echo $vars['object']->getID(); ?>" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Embed post...</h3>
    </div>

    <div class="modal-body">
        <textarea style='width: 98%; min-height: 200px;'>
        <?php
        echo htmlentities($this->draw('embeddedposts/embedcode'));
        ?>
        </textarea>
    </div>


    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>
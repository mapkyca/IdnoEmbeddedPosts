<?php

    namespace IdnoPlugins\EmbeddedPosts {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {
                // Share
                \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/share');
                \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/entity');
            }
        }
    }

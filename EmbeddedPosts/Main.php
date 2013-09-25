<?php

    namespace IdnoPlugins\EmbeddedPosts {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {

                // Javascript & CSS
                \Idno\Core\site()->template()->extendTemplate('shell/head','embeddedposts/css');
                \Idno\Core\site()->template()->extendTemplate('shell/footer','embeddedposts/js');

                // Share
                \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/share');
                \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/entity');
            }
        }
    }

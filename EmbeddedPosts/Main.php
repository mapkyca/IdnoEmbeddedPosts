<?php

    namespace IdnoPlugins\EmbeddedPosts {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {
                // Add oembed descovery
                 \Idno\Core\site()->template()->extendTemplate('shell/head','embeddedposts/header');
                
                // Share, but only if this isn't in the embed view
                if ($_REQUEST['_t'] != 'embed') { // TODO: Do this properly!
                    \Idno\Core\site()->template()->extendTemplate('content/end/links','embeddedposts/share');
                    \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/entity');
                }
            }
        }
    }

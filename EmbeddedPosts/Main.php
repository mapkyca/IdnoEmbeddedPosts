<?php

    namespace IdnoPlugins\EmbeddedPosts {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {
                // Add oembed descovery
                 \Idno\Core\site()->template()->extendTemplate('shell/head','embeddedposts/header');
		 
		 
		// Register handler page
		 \Idno\Core\site()->addPageHandler('/oembed', '\IdnoPlugins\EmbeddedPosts\Pages\OEmbed');
                
                // Share, but only if this isn't in the embed view
                if ((!isset($_REQUEST['_t'])) || ($_REQUEST['_t'] != 'embed')) { // TODO: Do this properly!
                    \Idno\Core\site()->template()->extendTemplate('content/end/links','embeddedposts/share');
                    \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/entity');
                }
            }
        }
    }

<?php

    namespace IdnoPlugins\EmbeddedPosts {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {
                // Add oembed descovery
                 \Idno\Core\site()->template()->extendTemplate('shell/head','embeddedposts/header');
		 
		// Adding embedded post settings page
		 \Idno\Core\site()->template()->extendTemplate('admin/menu/items', 'admin/embeddedposts/menu');
		 
		// Register admin settings
		 \Idno\Core\site()->addPageHandler('admin/embeddedposts', '\IdnoPlugins\EmbeddedPosts\Pages\Admin');
		 
		// Register handler page
		 \Idno\Core\site()->addPageHandler('/oembed', '\IdnoPlugins\EmbeddedPosts\Pages\OEmbed');
                
                // Share, but only if this isn't in the embed view
                if ((!isset($_REQUEST['_t'])) || ($_REQUEST['_t'] != 'embed')) { // TODO: Do this properly!
                    \Idno\Core\site()->template()->extendTemplate('content/end/links','embeddedposts/share');
                    \Idno\Core\site()->template()->extendTemplate('content/end','embeddedposts/entity');
                }
		
		// Handle known/known embed using oembed
		\Idno\Core\site()->template()->extendTemplate('entity/content/embed','embeddedposts/linking/embed');
		\Idno\Core\site()->template()->extendTemplate('shell/footer','embeddedposts/linking/footer');
            }
        }
    }

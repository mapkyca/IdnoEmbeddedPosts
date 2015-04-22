<?php

/**
 * EmbeddedPosts pages
 */

namespace IdnoPlugins\EmbeddedPosts\Pages {

    /**
     * Default class to serve EmbeddedPosts settings in administration
     */
    class Admin extends \Idno\Common\Page {

	function getContent() {
	    $this->adminGatekeeper(); // Admins only
	    $t = \Idno\Core\site()->template();
	    $body = $t->draw('admin/embeddedposts');
	    $t->__(['title' => 'Embedded Posts', 'body' => $body])->drawPage();
	}

	function postContent() {
	    $this->adminGatekeeper(); // Admins only

	    $whitelist = $this->getInput('whitelist');

	    if ($whitelist) {

		$array = preg_split('/[\s,;]+/', $whitelist);
		
		\Idno\Core\site()->config->config['embeddedposts'] = [
		    'whitelist' => $array
		];
		
		
	    \Idno\Core\site()->config()->save();
	    \Idno\Core\site()->session()->addMessage('Your Embedded posts settings were saved.');
	    }

	    $this->forward('/admin/embeddedposts/');
	}

    }

}
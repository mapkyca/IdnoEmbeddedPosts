<?php

namespace IdnoPlugins\EmbeddedPosts\Pages {

    /**
     * Default class to serve the oembed endpoint
     */
    class OEmbed extends \Idno\Common\Page {

        function getContent() {
            $query = $this->getInput('url');
            $format = $this->getInput('format');

            if ($query) {
                switch ($format) {

                    case 'json':
			// Set the correct header type
			header('Content-Type: application/json');
			
			// Get the object we're talking about
			if ($object = \Idno\Common\Entity::getByUUID($query)) {
			  
			    $t = \Idno\Core\site()->template();
			    $t->setTemplateType('oembed-' . $format);
			    $t->__(['title' => $object->title, 'body' => $object->draw()])->drawPage();
			}
			else
			{
			    $this->setResponse(404);
			    echo "$query not found, sorry.";
			}
                        
			break;
                    default:
			$this->setResponse(501);
                        echo "$format not implemented.";
                        
                }
            } else {
		$this->setResponse(500);
                echo "No URL found";
            }
        }

    }

}

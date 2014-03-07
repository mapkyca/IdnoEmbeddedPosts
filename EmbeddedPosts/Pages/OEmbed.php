<?php

namespace Idno\Pages {

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
                        echo json_encode();
                    default:
                        echo "$format not implemented.";
                        $this->setResponse(501);
                }
            } else {
                echo "No URL found";
                $this->setResponse(500);
            }
        }

    }

}

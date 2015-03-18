<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Deletes a content group.
class DeleteContent {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create Content repository object
        $contentRepo = $client->getRepo("Content");
        
        // The ID of the content group to remove
        $content_id = 1;
        
        // Deleting Content via API
        $result = $contentRepo->delete($content_id);
        
        // Printing result
        print_r($result);
    }
}
$example = new DeleteContent();
$example->run();
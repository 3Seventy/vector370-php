<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Gets the details for a specific push campaign event.
class GetEventPushCampaign {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create EventPushCampaign repository object
        $pushRepo = $client->getRepo("EventPushCampaign");
        
        // The specific event to get
        $event_id = 1;
        
        // Getting EventPushCampaign object
        $result = $pushRepo->get($event_id);
        
        // Printing result
        print_r($result);
    }
}
$example = new GetEventPushCampaign();
$example->run();
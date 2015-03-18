<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Gets the details of all push campaign event of an account.
class AllEventPushCampaign {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create EventPushCampaign repository object
        $pushRepo = $client->getRepo("EventPushCampaign");
        
        // Getting EventPushCampaign List
        $result = $pushRepo->getAll();
        
        // Printing result
        print_r($result);
    }
}
$example = new AllEventPushCampaign();
$example->run();
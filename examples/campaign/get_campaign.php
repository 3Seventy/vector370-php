<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Retreave the details for a specific campaign.
class GetCampaign {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create Campaign repository object
        $campaignRepo = $client->getRepo("Campaign");
        
        // The specific campaign to retrieve.
        $campaign_id = 1;
        
        // Getting Campaign object
        $result = $campaignRepo->get($campaign_id);
        
        // Printing result
        print_r($result);
    }
}
$example = new GetCampaign();
$example->run();
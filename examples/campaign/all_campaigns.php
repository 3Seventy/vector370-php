<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Gets a list of all campaigns belonging to an account.
class AllCampaigns {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create Campaign repository object
        $campaignRepo = $client->getRepo("Campaign");
        
        //Unset to display all items.
        $onlyMine = true; // {bool} DEFAULT: true;
        
        // Getting Campaigns List
        $result = $campaignRepo->getAll($onlyMine);
        
        // Printing result
        print_r($result);
    }
}
$example = new AllCampaigns();
$example->run();
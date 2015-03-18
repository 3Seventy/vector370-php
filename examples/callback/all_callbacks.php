<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Gets a list of all callbacks for an account.
class AllCallbacks {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create Callback repository object
        $callbackRepo = $client->getRepo("Callback");
        
        // Getting Callback List
        $result = $callbackRepo->getAll();
        
        // Printing result
        print_r($result);
    }
}
$example = new AllCallbacks();
$example->run();
<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Gets a list of contacts for a specific account.
class AllContacts {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create Contact repository object
        $contactRepo = $client->getRepo("Contact");
        
        // Getting Contact List
        $result = $contactRepo->getAll();
        
        // Printing result
        print_r($result);
    }
}
$example = new AllContacts();
$example->run();
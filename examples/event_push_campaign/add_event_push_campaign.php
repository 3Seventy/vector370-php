<?php
require '../../lib/three_seventy_api.php';
require '../config.php';
use ThreeSeventyApi\Client;

// Pushes a campaign to a list of phone numbers.
class AddEventPushCampaign {
    public function run() {
        // Load the config
        $config = getConfig();
        
        // Create Client object
        $client = new Client($config);
        
        // Create EventPushCampaign factory (optional)
        $pushFactory = $client->getFactory("EventPushCampaign");
        
        // Create EventPushCampaign object
        $eventPush = $pushFactory->getNew(array(
            "Name" => '', // {string} REQUIRED: The name of the event.
            "CampaignId" => '', // {int} REQUIRED: The campaign to push.
            "ChannelId" => '', // {int} REQUIRED: The channel to send the SMS out on.
            "ChannelIds" => '', // {array<int>} REQUIRED: A list of channel to send the message out on. 
            "ContactListId" => '', // Nullable{int} OPTIONAL: A contact list to push to. 
            "Targets" => '', // {array<string>} OPTIONAL: A list of targets to send to. These can be a mix of phone numbers, emails, or contact IDs.
            "TargetsUrl" => '', // {string} A URL pointing to a list of targets to send to.
            "ForceOptIn" => '', // {boolean} Opt an existing contact into the subscription if opted out
            "From" => '', // {string} Used for email channel. Can specify From address or default will be used.
            "IgnoreSingleUse" => '', // {bool} Check if the event is Single Use Push Event.
            "Message" => '', // {string} Required if campaign type is basic. Forbidden when not basic.
            "Subject" => '', // {string} Subject of the email.
            "ScheduleTypeId" => '', // {int} Schedule Type Id: Now, OneTime, second, minute, hour, daily, weekly, monthly, yearly. (1) Now, (2) One Time, (6) Daily
            "Interval" => '', // {int} Value in seconds (0-60), minutes(0-60) or hours(1-12) if repeated after specified interval. 
                    //Days of the week use a bit mask to specify when to run: 0x01 = Monday 0x02 = Tuesday 0x04 = Wednesday 0x08 = Thursday 0x10 = 
                    //Friday 0x20 = Saturday 0x40 = Sunday 0x7F = Every day
            "StartDateTime" => '', // Nullable{DateTime} Starting time for the recurring schedule. Ex: Every 15 mins from 4am to 8 am.
            "EndDateTime" => '', // Nullable{DateTime} End time for the recurring schedule. Ex: Every 15 mins from 4am to 8 am.
            "DayOfWeek" => '', // {string} Specify when the recurring schedule occurs during the week. 
                    //Values can be 1-7 or MON,TUE,WED,THU,FRI,SAT,SUN Multiple values can be specified using comma as delimiter. Use * for all days.
            "DayOfMonth" => '', // {string} Day of month. 1-31 depending on which month. * for all months
            "Month" => '', // {string} Month :0 and 11, or by using the strings JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV and DEC. * for all months
            "Year" => '' // {string} Year. 4 digit or comma delimited for multiple years. ex: 2013 or 2013,2014.
        ));
        
        // Create EventPushCampaign repository object
        $pushRepo = $client->getRepo("EventPushCampaign");
        
        // Adding EventPushCampaign via API
        $result = $pushRepo->add($eventPush);
        
        // Printing result
        print_r($result);
    }
}
$example = new AddEventPushCampaign();
$example->run();
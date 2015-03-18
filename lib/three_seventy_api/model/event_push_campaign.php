<?php
namespace ThreeSeventyApi\Model;

/* EventPushCampaign factory and model entity.
 * extends BaseAudited.
 */
class EventPushCampaign extends BaseAudited {
    
    /* {int} The account ID the event belongs to. */
    public $account_id;
    
    /* {string} The name of the event. */
    public $name;
    
    /* {int} The channel to send the SMS out on. */
    public $channel_id;
    
    /* {array<int>} A list of channel to send the message out on. */
    public $channel_ids;
    
    /* {array<string>} A list of targets to send to. These can be a mix of phone numbers, emails, or contact IDs. */
    public $targets;
    
    /* {string} A URL pointing to a list of targets to send to. */
    public $targets_url;
    
    /* Nullable{int} A contact list to push to.*/
    public $contact_list_id;
    
    /* {int} The campaign to push. */
    public $campaign_id;
    
    /* {string} Used for email channel. Can specify From address or default will be used. */
    public $from;
    
    /* {bool} Check if the event is Single Use Push Event. */
    public $ignore_single_use;
    
    /* {bool} Opt an existing contact into the subscription if opted out. */
    public $force_opt_in;
    
    /* {string} Required if campaign type is basic. Forbidden when not basic. */
    public $message;
    
    /* {string} Subject of the email. */
    public $subject;
    
    /* {int} {Schedule Type Id: Now, OneTime, second, minute, hour, daily, weekly, monthly, yearly. */
    public $schedule_type_id;
    
    /* {int} Value in seconds (0-60), minutes(0-60) or hours(1-12) if repeated after specified interval. Days of the week use a bit mask to specify when to run: 0x01 = Monday 0x02 = Tuesday 0x04 = Wednesday 0x08 = Thursday 0x10 = Friday 0x20 = Saturday 0x40 = Sunday 0x7F = Every day */
    public $interval;
    
    /* Nullable{date} Starting time for the recurring schedule. Ex: Every 15 mins from 4am to 8 am. */
    public $start_date_time;
    
    /* Nullable{date} End time for the recurring schedule. Ex: Every 15 mins from 4am to 8 am. */
    public $end_date_time;
    
    /* {string} Specify when the recurring schedule occurs during the week. Values can be 1-7 or MON,TUE,WED,THU,FRI,SAT,SUN Multiple values can be specified using comma as delimiter. Use * for all days. */
    public $day_of_week;
    
    /* {string} Day of month. 1-31 depending on which month. * for all months. */
    public $day_of_month;
    
    /* {string} Month :0 and 11, or by using the strings JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV and DEC. * for all months. */
    public $month;
    
    /* {string} Year. 4 digit or comma delimited for multiple years. ex: 2013 or 2013,2014. */
    public $year;
    
    /* Constructs EventPushCampaign entity
     * @param $data {EventPushCampaign} || {array} || {JSON} New EventPushCampaign entity details.
     * @return {EventPushCampaign} new EventPushCampaign entity.
     */
    public function __construct($data = null) {
        if(is_string($data)){
          $data = json_decode($data);
        }
        $data = (array) $data;
        
        parent::__construct($data);
        
        $this->account_id = isset($data['AccountId']) ? $data['AccountId'] : null;
        $this->name = isset($data['Name']) ? $data['Name'] : null;
        $this->channel_id = isset($data['ChannelId']) ? $data['ChannelId'] : null;
        $this->channel_ids = isset($data['ChannelIds']) ? $data['ChannelIds'] : null;
        $this->targets = isset($data['Targets']) ? $data['Targets'] : null;
        $this->targets_url = isset($data['TargetsUrl']) ? $data['TargetsUrl'] : null;
        $this->contact_list_id = isset($data['ContactListId']) ? $data['ContactListId'] : null;
        $this->campaign_id = isset($data['CampaignId']) ? $data['CampaignId'] : null;
        $this->from = isset($data['From']) ? $data['From'] : null;
        $this->ignore_single_use = isset($data['IgnoreSingleUse']) ? $data['IgnoreSingleUse'] : null;
        $this->force_opt_in = isset($data['ForceOptIn']) ? $data['ForceOptIn'] : null;
        $this->message = isset($data['Message']) ? $data['Message'] : null;
        $this->subject = isset($data['Subject']) ? $data['Subject'] : null;
        $this->schedule_type_id = isset($data['ScheduleTypeId']) ? $data['ScheduleTypeId'] : null;
        $this->interval = isset($data['Interval']) ? $data['Interval'] : null;
        $this->start_date_time = isset($data['StartDateTime']) ? $data['StartDateTime'] : null;
        $this->end_date_time = isset($data['EndDateTime']) ? $data['EndDateTime'] : null;
        $this->day_of_week = isset($data['DayOfWeek']) ? $data['DayOfWeek'] : null;
        $this->day_of_month = isset($data['DayOfMonth']) ? $data['DayOfMonth'] : null;
        $this->month = isset($data['Month']) ? $data['Month'] : null;
        $this->year = isset($data['Year']) ? $data['Year'] : null;
    }
    
    /* EventPushCampaign factory method to create new EventPushCampaign entity.
     * @param $data {EventPushCampaign} || {array} || {JSON} New EventPushCampaign entity details.
     * @return {EventPushCampaign} new EventPushCampaign entity.
     */
    public function getNew($data){
        foreach($this as $key => $value){
            unset($this->$key);
        }
        self::__construct($data);
        return $this;
    }
    
    /* Creates array from current object.
     * Used to send submissions to API.
     * @return {array} Array representation of current object.
     */
    public function toArray(){
        return array(
            "Name" => $this->name,
            "ChannelId" => $this->channel_id,
            "ChannelIds" => $this->channel_ids,
            "Targets" => $this->targets,
            "TargetsUrl" => $this->targets_url,
            "ContactListId" => $this->contact_list_id,
            "CampaignId" => $this->campaign_id,
            "From" => $this->from,
            "IgnoreSingleUse" => $this->ignore_single_use,
            "ForceOptIn" => $this->force_opt_in,
            "Message" => $this->message,
            "Subject" => $this->subject,
            "ScheduleTypeId" => $this->schedule_type_id,
            "Interval" => $this->interval,
            "StartDateTime" => $this->start_date_time,
            "EndDateTime" => $this->end_date_time,
            "DayOfWeek" => $this->day_of_week,
            "DayOfMonth" => $this->day_of_month,
            "Month" => $this->month,
            "Year" => $this->year,
        );
    }
    
    /* Creates the JSON string from current EventPushCampaign object.
     * @return {string} JSON string.
     */
    public function _json(){
        $hash = array(
            "Id" => $this->id,
            "AccountId" => $this->account_id,
            "Name" => $this->name,
            "ChannelIds" => $this->channel_ids,
            "Targets" => $this->targets,
            "ContactIds" => $this->contacts,
            "ContactListId" => $this->contact_list_id,
            "CampaignId" => $this->campaign_id,
            "From" => $this->from,
            "IgnoreSingleUse" => $this->ignore_single_use,
            "ForceOptIn" => $this->force_opt_in,
            "Message" => $this->message,
            "Subject" => $this->subject,
            "ScheduleTypeId" => $this->schedule_type_id,
            "Interval" => $this->interval,
            "StartDateTime" => $this->start_date_time,
            "EndDateTime" => $this->end_date_time,
            "DayOfWeek" => $this->day_of_week,
            "DayOfMonth" => $this->day_of_month,
            "Month" => $this->month,
            "Year" => $this->year
        );
        return json_encode($hash);
    }
}
<?php
namespace ThreeSeventyApi\Api;

use ThreeSeventyApi\Helpers\Request;
use ThreeSeventyApi\Helpers\Url;
use ThreeSeventyApi\Model\EventPushCampaign as EventPushCampaignModel;
use ThreeSeventyApi\Model\ErrorDetail;

/* Repository entity. Allows user to get access to EventPushCampaign actions.
 * @see https://api.3seventy.com/docs/v2.0/Default/endpoints#!/eventpushcampaign
 */
class EventPushCampaign {

    /* {Request} Request object to perform calls with. */
    private $request;

    public function __construct() {
        $this->request = new Request();
    }
    
    /* Gets the details for a specific push campaign event.
     * @param $event_id {int} The specific event to get.
     * @param $validated {bool} Set true to throw error if there is no account with specified id otherwise it returns NULL.
     * @return {EventPushCampaign} Push campaign event with specified ID.
     * @error {ErrorDetail} Details about error happend.
     */
    public function get($event_id, $validated = false){
        $response = $this->request->get(Url::url_(array("event-pushcampaign", $event_id)), $validated);
        if($response instanceof ErrorDetail){
            return $response;
        }
        if(empty($response)){
            return null;
        }
        return new EventPushCampaignModel($response);
    }

    /* Pushes a campaign to a list of phone numbers.
     * @param $payload {EventPushCampaign} || {array} || {JSON} Details of the event to run.
     * @return {EventPushCampaign} New push campaign event details.
     * @error {ErrorDetail} Details about error happend.
     */
    public function add($payload){
        if($payload instanceof EventPushCampaignModel)
            $payload = $payload->toArray();
        $response = $this->request->post(Url::url_(array("event-pushcampaign")), $payload);
        if($response instanceof ErrorDetail){
            return $response;
        }
        return new EventPushCampaignModel($response);
    }

    /* Gets the details for all push campaign events.
     * @return {array<EventPushCampaign>} List of pushed campaign events.
     * @error {ErrorDetail} Details about error happend.
     */
    public function getAll(){
        $response = $this->request->get(Url::url_(array("event-pushcampaign")));
        if($response instanceof ErrorDetail){
            return $response;
        }
        $result = array();
        $pushes = json_decode($response);
        if(is_array($pushes)){
            foreach($pushes as $item){
                $result[] = new EventPushCampaignModel($item);
            }
        }
        return $result;
    }
}
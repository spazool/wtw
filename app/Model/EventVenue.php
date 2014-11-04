<?php
App::uses('AppModel', 'Model');

class EventVenue extends AppModel{
    
    public function createEventVenueLink($event_id,$venue_id){
        
        $options = array(
            'fields' => array(
                'EventVenue.id'
            ),
            'conditions' => array(
                'EventVenue.event_id' => $event_id
            ),
            'recursive' => -1
        );
        
        $exists = $this->find('first',$options);
        
        $data = array();
        
        if(!empty($exists)){
            $data['EventVenue']['id'] = $exists['EventVenue']['id'];
        }
        
        $data['EventVenue']['event_id'] = $event_id;
        $data['EventVenue']['venue_id'] = $venue_id;
        
        if($this->save($data)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    
    
}

?>

<?php
App::uses('AppModel', 'Model');

class Venue extends AppModel{
    
    public $displayField = 'name';
    
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Venue Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Venue Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Venue Name must be between 2 and 50 characters'
            )
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Venue description is required'
            ),
            'between' => array(
                'rule' => array('between', 2, 500),
                'message' => 'Venue Description must be between 5 and 300 characters'
            )
        ),
        'website' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Venue website URL is required'
            ),
            'url' => array(
                'rule' => 'url',
                'message' => 'Please enter a valid url: www.example.com'
            )            
        ),
        'email' => array(
            'notEmpty' => array(	
                'rule' => 'notEmpty',	
                'required' => true,
                'message' => 'Email Address is required'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'A valid email address must be supplied'
            )
        ),
        'phone' => array(
            'Numeric' => array(
                'rule' => 'Numeric',
                'message' => 'Please enter a valid phone number'
            ),
            'length' => array(
                'rule' => array('minLength', 10),
                'message' => 'Phone number must be 10 digits'
            ),
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )
        )
    );
    
    public function getAllVenues($type = 2){
        
        if($type !== 4){
            $options['conditions']['Venue.type'] = $type; 
        }
        
        $options = array(
            'fields' => array(
                'Venue.id',
                'Venue.name',
                'Venue.description',
                'Venue.logo',
                'Venue.website',
                'Venue.email',
                'Venue.phone',
                'Venue.type',
                'Venue.address_line_one',
                'Venue.address_line_two',
                'Venue.city_id',
                'Venue.province_id',
                'Venue.country_id',
                'Venue.latitude',
                'Venue.longitude',
                'Venue.created'
            ),
            'recursive' => -1
        );
        
        $return_venues = $this->find('all',$options);
        return $return_venues;
        
    }
    
    public function getVenueById($venue_id = NULL){
        
        if($venue_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'Venue.id',
                'Venue.name',
                'Venue.description',
                'Venue.logo',
                'Venue.website',
                'Venue.email',
                'Venue.phone',
                'Venue.type',
                'Venue.address_line_one',
                'Venue.address_line_two',
                'Venue.city_id',
                'Venue.province_id',
                'Venue.country_id',
                'Venue.latitude',
                'Venue.longitude',
                'Venue.created'
            ),
            'conditions' => array(
                'Venue.id' => $venue_id
            ),
            'recursive' => -1
        );
        
        $return_venue = $this->find('first',$options);
        return $return_venue;
    }
    
    public function createVenue($insert_array = NULL){
        
        if($insert_array == NULL){
            return FALSE;
        }
        
        if($this->save($insert_array,$validate = FALSE)){
            return TRUE;
        } else {
            return FALSE;
        }
        
        
    }
    
    public function editVenue($edit_array = NULL){
        
        if($insert_array == NULL){
            return FALSE;
        }
        
        if($this->save($insert_array,$validate = FALSE)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function deleteVenue($id = NULL){
        if($id == NULL){
            return FALSE;
        }
        
        if($this->delete($id)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getVenueForEvent($event_id){
        $options = array(
            'fields' => array(
                'EventVenue.venue_id'
            ),
            'conditions' => array(
                'EventVenue.event_id' => $event_id
            ),
            'recursive' => -1
        );
        $this->EventVenue = ClassRegistry::init('EventVenue');
        $venue_link = $this->EventVenue->find('first',$options);
        
        if(!empty($venue_link)){
            
            $options = array(
                'conditions' => array(
                    'Venue.id' => $venue_link['EventVenue']['venue_id']
                ),
                'recursive' => -1
            );
            
            return $this->find('first',$options);
            
        } else {
            return false;
        }
        
    }
    
    
    
}

?>

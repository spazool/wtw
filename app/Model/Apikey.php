<?php

App::uses('AppModel', 'Model');

class Apikey extends AppModel {
    
    
    public function getGoogleMapsAuth(){
        
        $options = array(
            'fields' => array(
                'Apikey.api_key',
                'Apikey.url'
            ),
            'conditions' => array(
                'Apikey.name' => 'Google Maps'
            ),
            'recursive' => -1
        );
        
        return $this->find('first',$options);
    }
    
    
    
}

?>

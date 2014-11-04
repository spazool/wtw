<?php
App::uses('AppModel', 'Model');

class Organiser extends AppModel {
    //validation needed
    
    
    public function createOrganiser($insert_data = NULL){
        
        if($insert_data == NULL){
            return FALSE;
        }
        
        if($this->save($insert_data,$validate = FALSE)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function editOrganiser($insert_data = NULL){
        
        if($insert_data == NULL){
            return FALSE;
        }
        
        if($this->save($insert_data,$validate = FALSE)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function findEventOrganiser($event_id = NULL){
        
        if($event_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'Organiser.id',
                'Organiser.organiser_name',
                'Organiser.contact_name',
                'Organiser.telephone',
                'Organiser.email',
                'Organiser.website'
            ),
            'conditions' => array(
                'Organiser.event_id' => $event_id
            ),
            'recursive' => -1
        );
        
        $organisers = $this->find('first',$options);
        
        if(!empty($organisers)){
            return $organisers;
        } else {
            return FALSE;
        }
        
    }
    
    
    
}

?>

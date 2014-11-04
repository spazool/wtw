<?php
App::uses('AppModel', 'Model');

class EventUrl extends AppModel{
    
    public function createEventUrl($insert_data = NULL){
        
        if($insert_data == NULL){
            return FALSE;
        }
        
        if($this->save($insert_data)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function deleteEventUrl($id = NULL){
        
        if($id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'EventUrl.id'
            ),
            'conditions' => array(
                'EventUrl.id' => $id
            ),
            'recursive' => -1
        );
        
        $exists = $this->find('first',$options);
        
        if(empty($exists)){
            return TRUE;
        }
        
        if($this->delete($id)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function findUrlsByEvent($event_id = NULL){
        if($event_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'EventUrl.id',
                'EventUrl.name',
                'EventUrl.url',
                'EventUrl.url_type_id'
            ),
            'conditions' => array(
                'EventUrl.event_id' => $event_id
            ),
            'recursive' => -1
        );
        
        $event_urls = $this->find('all',$options);
        
        if(!empty($event_urls)){
            return $event_urls;
        } else {
            return FALSE;
        }
        
        
    }
    
}

?>

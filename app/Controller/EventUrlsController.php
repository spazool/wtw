<?php
App::uses('AppController', 'Controller');

class EventUrlsController extends AppController {
    
//    public function add_event_urls($event_id = NULL){
//        
//    }
//    
//    public function edit_event_url($event_id = NULL){
//        
//    }
    
    public function edit_event_url($event_id = NULL){
        if($event_id == NULL){
            //NO EVENT GIVEN
            RETURN;
        }
        
        if($this->request->is('Post') || $this->request->is('Put')){
            //save data
            $this->EventUrl->set($this->request->data);
            $validate = array('fieldList' => array('ticket_name','price'));
            
            $this->EventUrl->save($this->request->data);
            return $this->redirect(array('controller' => 'events','action' => 'view_event',$event_id));
            
            
        } else {
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

            $this->request->data = $this->EventUrl->find('all',$options);
        }
        $this->UrlType = ClassRegistry::init('UrlType');
        $url_types = $this->UrlType->find('list');
//        debug($urlTypes);
        $this->set(compact($url_types));
        
        $this->set($this->request->data);
        $this->set('event_id',$event_id);
        
        
    }
    
}

?>

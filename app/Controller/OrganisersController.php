<?php
App::uses('AppController', 'Controller');

class OrganisersController extends AppController {
    
    public function cloud_add_event_organiser($event_id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $event_organiser = $this->Organiser->findEventOrganiser($event_id);
        
        if($this->request->is('Post') || $this->request->is('Put')){
            $data = array();
            $data = $this->request->data;
            
            if($event_organiser !== FALSE){
                $data['Organiser']['id'] = $event_organiser['Organiser']['id'];
            }
            $data['Organiser']['event_id'] = $event_id;
            
            if($this->Organiser->save($data)){
                $this->Session->setFlash(__('Organiser has been saved'),'bk_success');
                return $this->redirect(array('controller' => 'Events','action' => 'cloud_view_event', $event_id));
            } else {
                $this->set('organiser',  $this->request->data);
                $this->Session->setFlash(__('Organiser could not be saved'),'bk_error');
                return;
            }
        }
        
        if($event_organiser !== FALSE){
            $this->request->data = $event_organiser;
            $this->set('organiser',  $this->request->data);
        }
        
        
    }
    
    public function add_event_organiser($event_id = NULL){
        
    }
    
    public function edit_event_organiser($event_id = NULL){
        $event_organiser = $this->Organiser->findEventOrganiser($event_id);
        
        if($this->request->is('Post') || $this->request->is('Put')){
            $data = array();
            $data = $this->request->data;
            
            if($event_organiser !== FALSE){
                $data['Organiser']['id'] = $event_organiser['Organiser']['id'];
            }
            $data['Organiser']['event_id'] = $event_id;
            
            if($this->Organiser->save($data)){
//                $this->Session->setFlash(__('Organiser has been saved'),'bk_success');
                return $this->redirect(array('controller' => 'events','action' => 'view_event', $event_id));
            } else {
                $this->set('organiser',  $this->request->data);
//                $this->Session->setFlash(__('Organiser could not be saved'),'bk_error');
                return;
            }
        }
        
        if($event_organiser !== FALSE){
            $this->request->data = $event_organiser;
            $this->set($this->request->data);
        }
        
        $this->set('event_id',$event_id);
    }
    
    
    
}

?>

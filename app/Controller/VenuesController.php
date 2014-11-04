<?php
App::uses('AppController', 'Controller');

class VenuesController extends AppController{
    
    
    public $components = array('RequestHandler');
    
    public function beforeRender() {
        parent::beforeRender();
        $this->set('referer',$this->referer()); 
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
//        $this->RequestHandler->addInputType('json', array('json_decode', true));
//        $this->RequestHandler->accepts('json');
        $this->Auth->allow('get_long_lat');
    }

    
    public function cloud_index(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $paginate = $this->Paginator->paginate();
        $this->set('venues',$paginate);
        
    }
    
    public function cloud_view($id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($id == NULL){
            $this->Session->setFlash(__('Venue could not be found'),'bk_error');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
        $venue = $this->Venue->getVenueById($id);
        
        if(empty($venue)){
            $this->Session->setFlash(__('Venue could not be found'),'bk_error');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
        $this->set('venue', $venue);
    }
    
    public function cloud_add_venue(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($this->request->is('Post')){
            
            $this->Venue->set($this->request->data);
            $validate = array('fieldList' => array('name','description','email','phone','website'));
            
            if($this->Venue->validates($validate)){
                $this->request->data['Venue']['type'] = 2;
                $this->request->data['Venue']['country_id'] = $this->request->data['c']['country_id'];
                $this->request->data['Venue']['province_id'] = $this->request->data['c']['province_id'];
                $this->request->data['Venue']['city_id'] = $this->request->data['c']['city_id'];
                if($this->Venue->createVenue($this->request->data)){
                    $this->Session->setFlash(__('Venue has been saved'),'bk_success');
                    return $this->redirect(array('action' => 'cloud_index'));
                } else {
                    $this->Session->setFlash(__('Venue could not be saved'),'bk_error');
                    return;
                }
                
            } else {
                $this->Session->setFlash(__('Validation Error'),'bk_error');
                return;
            }
            
            
        }
        
        $this->Country = ClassRegistry::init('Country');
        $countries = $this->Country->find('list');
        $this->set(compact('countries'));
        
    }
    
    public function cloud_edit($id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($this->request->is('Post')){
            
            $this->Venue->set($this->request->data);
            $validate = array('fieldList' => array('name','description','email','phone','website'));
            
            if($this->Venue->validates($validate)){
                $this->request->data['Venue']['type'] = 2;
                $this->request->data['Venue']['country_id'] = $this->request->data['c']['country_id'];
                $this->request->data['Venue']['province_id'] = $this->request->data['c']['province_id'];
                $this->request->data['Venue']['city_id'] = $this->request->data['c']['city_id'];
                if($this->Venue->createVenue($this->request->data)){
                    $this->Session->setFlash(__('Venue has been saved'),'bk_success');
                    return $this->redirect(array('action' => 'cloud_index'));
                } else {
                    $this->Session->setFlash(__('Venue could not be saved'),'bk_error');
                    
                }
                
            } else {
                $this->Session->setFlash(__('Validation Error'),'bk_error');
                
            }
            
            
        }
        
        $this->request->data = $this->Venue->findById($id);
        
        $this->set('venue',$this->request->data);
        
        $this->Country = ClassRegistry::init('Country');
        $countries = $this->Country->find('list');
        $this->set(compact('countries'));
    }


    public function cloud_delete($id = NULL){
        if($id == NULL){
            $this->Session->setFlash(__('Venue could not be found'),'bk_error');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
        if($this->Venue->deleteVenue($id)){
            $this->Session->setFlash(__('Venue has been successfully deleted'),'bk_success');
            return $this->redirect(array('action' => 'cloud_index'));
        } else {
            $this->Session->setFlash(__('Venue could not be deleted'),'bk_error');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
    }
    
    public function cloud_add_event_venue($event_id){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($this->request->is('Post')){
            
            $this->Venue->set($this->request->data);
            $validate = array('fieldList' => array('name','description','email','phone','website'));
            
            if($this->Venue->validates($validate)){
                $this->request->data['Venue']['type'] = 1;
                $this->request->data['Venue']['country_id'] = $this->request->data['c']['country_id'];
                $this->request->data['Venue']['province_id'] = $this->request->data['c']['province_id'];
                $this->request->data['Venue']['city_id'] = $this->request->data['c']['city_id'];
                if($this->Venue->createVenue($this->request->data)){
                    $venue_id = $this->Venue->id;
                    //create link to event and organiser
                    $this->EventVenue = ClassRegistry::init('EventVenue');
                    //create link
                    $this->EventVenue->createEventVenueLink($event_id,$venue_id);
                    $this->Session->setFlash(__('Venue has been added to Event'),'bk_success');
                    return $this->redirect(array('controller' => 'Events','action' => 'cloud_view_event', $event_id));
                } else {
                    $this->Session->setFlash(__('Venue could not be saved'),'bk_error');
                    return;
                }
                
            } else {
                $this->Session->setFlash(__('Validation Error'),'bk_error');
                return;
            }
            
            
        }
        
        $this->set('event_id',$event_id);
        $this->Country = ClassRegistry::init('Country');
        $countries = $this->Country->find('list');
        $this->set(compact('countries'));
        
    }
    
    public function cloud_add_existing_venue($event_id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($this->request->is('Post')){
            $data = $this->request->data;
            $venue_id = $data['Venue']['venue_id'];
            
            if(empty($venue_id) || $event_id == NULL){
                $this->Session->setFlash(__('You have not selected a Venue'),'bk_error');
                return;
            }
            
            $this->EventVenue = ClassRegistry::init('EventVenue');
                    //create link
            $this->EventVenue->createEventVenueLink($event_id,$venue_id);
            $this->Session->setFlash(__('Venue has been added to Event'),'bk_success');
            return $this->redirect(array('controller' => 'Events','action' => 'cloud_view_event', $event_id));
            
        }
        
        $options = array(
            'conditions' => array(
                'Venue.type' => 2
            )
        );
        
        $venues = $this->Venue->find('list',$options);
        $this->set(compact('venues'));
        $this->set('event_id',$event_id);
        
    }
    
    public function add_event_venue($event_id = NULL){
        
    }
    
    public function edit_event_venue($event_id = NULL){
        
        if($this->request->is('Put') || $this->request->is('Post')){
            
            $this->Venue->set($this->request->data);
            $validate = array('fieldList' => array('name','description','email','phone','website'));
            $this->set($this->request->data);
            if($this->Venue->validates($validate)){
                $this->request->data['Venue']['type'] = 1;
                if($this->Venue->save($this->request->data, $validate = false)){
                    //create link between venue and event
                    $this->EventVenue = ClassRegistry::init('EventVenue');
                    
                    $options = array(
                        'fields' => array(
                            'EventVenue.id'
                        ),
                        'conditions' => array(
                            'EventVenue.event_id' => $event_id
                        ),
                        'recursive' => -1
                    );
                    
                    $eventVenue = $this->EventVenue->find('first',$options);
                    $data = array();
                    if(!empty($eventVenue)){
                        $data['EventVenue']['id'] = $eventVenue['EventVenue']['id'];
                    }
                    
                    $data['EventVenue']['event_id'] = $event_id;
                    $data['EventVenue']['venue_id'] = $this->Venue->id;
                    
                    $this->EventVenue->save($data);
                    //save it
//                    $this->Session->setFlash(__('Venue has been saved'),'bk_success');
                    return $this->redirect(array('controller' => 'events','action' => 'view_event', $event_id));
                } else {
                    $this->Session->setFlash(__('Venue could not be saved'),'bk_error');
                    $this->Session->setFlash(__('Validation Error'),'bk_error');
                    $this->set('event_id',$event_id);
                    $this->Country = ClassRegistry::init('Country');
                    $countries = $this->Country->find('list');
                    $this->set(compact('countries'));
                    return;
                }
                
            } else {
                $this->Session->setFlash(__('Validation Error'),'bk_error');
                $this->set('event_id',$event_id);
                $this->Country = ClassRegistry::init('Country');
                $countries = $this->Country->find('list');
                $this->set(compact('countries'));
                return;
            }
            
            
        }
        
        if(empty($this->request->data)){
            $this->EventVenue = ClassRegistry::init('EventVenue');
            $options = array(
                //find venue id from event
                'fields' => array(
                    'EventVenue.venue_id'
                ),
                'conditions' => array(
                    'EventVenue.event_id' => $event_id
                )
            );
            $venue_id = $this->EventVenue->find('first',$options);
            
            if(!empty($venue_id)){
                $options = array(
                    'conditions' => array(
                        'Venue.id' => $venue_id['EventVenue']['venue_id']
                    )
                );
                
                $venue = $this->Venue->find('first',$options);
                
                $this->request->data = $venue;
                $this->set($this->request->data);
            }
            
        }
        
        $this->set('event_id',$event_id);
        $this->Country = ClassRegistry::init('Country');
        $countries = $this->Country->find('list');
        $this->set(compact('countries'));
    }
    
    public function view_venue($id = NULL){
        
    }
    
    public function get_long_lat(){
        $this->layout = 'ajax';
        $data = $this->request->input('json_decode', TRUE);
        
        $this->Google = ClassRegistry::init('Google');
        $response = $this->Google->getAddressCoordinates($data['address']);
        
        $this->set('Reply', $response);
        $this->set('_serialize', array('Reply'));
    }
    
    
    
    
    
    
}

?>

<?php
App::uses('AppController', 'Controller');

class TicketsController extends AppController {
    
    public function cloud_add_event_tickets($event_id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $tickets = $this->Ticket->findTicketsForEvent($event_id);
        
        if($this->request->is('Post') || $this->request->is('Put')){
            debug($this->request->data);
            $this->Ticket->save($this->request->data);
        }
        
        if($tickets !== FALSE){
            $this->request->data = $tickets;
            $this->set('tickets',  $this->request->data);
        }
        $this->set('event_id',$event_id);
        $this->log($this->request->data);
    }
    
    public function cloud_delete_ticket($event_id,$ticket_id){
        $this->autoRender = false;
        $this->layout = false; 
        $this->Ticket->delete($ticket_id);
            return $this->redirect(array('action' => 'cloud_add_event_tickets', $event_id));
        
    }
    
    public function cloud_renderElement($count){
        $this->autoRender = false;
        $this->layout = false; 
        $this->log($count,'element');
        $this->set(compact('count'));
        return $this->render('/Elements/tickets/tickets');
    }
    
    public function add_event_tickets($event_id = NULL){
        if($event_id == NULL){
            //NO EVENT GIVEN
            RETURN;
        }
        
        if($this->request->is('Post')){
            
            $this->Ticket->set($this->request->data);
            $validate = array('fieldList' => array('ticket_name','price'));
            
            if($this->Ticket->validates($validate)){
                debug($this->request->data);
            }
            
        }
        
        $this->set('event_id',$event_id);
        
            
        
        
    }
    
    public function add_event_ticket($event_id = NULL){
        if($event_id == NULL){
            //NO EVENT GIVEN
            RETURN;
        }
        
        if($this->request->is('Post')){
            //save data
            $this->Ticket->set($this->request->data);
            $validate = array('fieldList' => array('ticket_name','price'));
            
            if($this->Ticket->validates($validate)){
                //save
                debug($this->request->data);
                $this->Ticket->save($this->request->data);
                return $this->redirect(array('controller' => 'events','action' => 'view_event',$event_id));
            }
            
        }
        
        $this->set('event_id',$event_id);
    }
    
    public function edit_event_ticket($ticket_id = NULL){
        if($this->request->is('Post') || $this->request->is('Put')){
            //save data
            $this->Ticket->set($this->request->data);
            $validate = array('fieldList' => array('ticket_name','price'));
            
            if($this->Ticket->validates($validate)){
                //save
                debug($this->request->data);
                $this->Ticket->save($this->request->data);
                return $this->redirect(array('controller' => 'events','action' => 'view_event',$this->request->data['Ticket']['event_id']));
            }
            
        } else {
            $options = array(
                'fields' => array(
                    'Ticket.id',
                    'Ticket.ticket_name',
                    'Ticket.price',
                    'Ticket.event_id'
                ),
                'conditions' => array(
                    'Ticket.id' => $ticket_id
                ),
                'recursive' => -1
            );

            $this->request->data = $this->Ticket->find('first',$options);
        }
        
        $this->set($this->request->data);
        $this->set('event_id',$this->request->data['Ticket']['event_id']);
        $this->set('ticket_id',$this->request->data['Ticket']['id']);
    }
    
    public function delete_ticket($ticket_id,$event_id){
        
        $this->Ticket->delete($ticket_id);
        return $this->redirect(array('controller' => 'events','action' => 'view_event',$event_id));
    }
    
    
}

?>

<?php
App::uses('AppModel', 'Model');

class Ticket extends AppModel {
    
    public $validate = array(
        'ticket_name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Ticket Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Ticket Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Ticket Name must be between 2 and 50 characters'
            )
        ),
        'price' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Ticket Price is required'
            ),
            'price' => array(
                'rule'    => array('money', 'left'),
//                'rule' => array('decimal', 2),
                'message' => 'Please supply a valid monetary amount. eg: R200.00'
            )
        )
    );
        
    
    public function findTicketsForEvent($event_id = NULL){
        if($event_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'Ticket.id',
                'Ticket.ticket_name',
                'Ticket.price'
            ),
            'conditions' => array(
                'Ticket.event_id' => $event_id
            ),
            'recursive' => -1
        );
        
        $tickets = $this->find('all',$options);
        
        if(!empty($tickets)){
            return $tickets;
        } else {
            return FALSE;
        }
        
        
    }
    
    public function addTicketForEvent($event_id,$ticket_name,$ticket_price){
        
    }
}

?>

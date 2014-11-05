<?php

App::uses('AppModel', 'Model');

class Landing extends AppModel {
    
    var $useTable = false;
    
    public $validate = array(
        
        'fullname' => array(	
            'notEmpty' => array(	
                'rule' => 'notEmpty',	
                'required' => true,
                'message' => 'Full Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'The Full Name supplied is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Full Name must be between 2 and 50 characters'
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
//        'mobile' => array(
//            'notEmpty' => array(	
//                'rule' => 'notEmpty',	
//                'required' => true,
//                'message' => 'Tel is required'
//            ),
//            'numeric' => array(	
//                'rule' => 'numeric',	
//                'message' => 'Invalid Tel number'
//            ),
//            'between' => array(	
//                'rule' => array('between', 10, 12),	
//                'message' => 'Invalid Tel number'
//            ),
//            
//        ),
        'message' => array(
            'notEmpty' => array(	
                'rule' => 'notEmpty',	
                'required' => true,
                'message' => 'Please supply a message'
            )
        )
        
        
        
    );
}

?>

<?php
App::uses('AppModel', 'Model');

class Provider extends AppModel {
    
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Provider Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Provider Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Provider Name must be between 2 and 50 characters'
            )
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Description is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Description is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 200),
                'message' => 'Description must be between 2 and 200 characters'
            )
        ),
        'contact_name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Contact Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Contact Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Contact Name must be between 2 and 50 characters'
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
        'website' => array(
            'notEmpty' => array(	
                'rule' => 'notEmpty',	
                'required' => true,
                'message' => 'Website Address is required'
            ),
            'url' => array(
                'rule' => 'url',
                'message' => 'A valid website address must be supplied'
            )
        ),
        'phone' => array(
            'notEmpty' => array(	
                'rule' => 'notEmpty',	
                'required' => true,
                'message' => 'Phone number is required'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter a valid phone number'
            ),
            'length' => array(
                'rule' => array('minLength',10),
                'message' => 'Phone number must be 10 digits'
            )
        ),
        'fax' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'allowEmpty' => true,
                'message' => 'Please enter a valid fax number'
            ),
            'length' => array(
                'rule' => array('minLength',10),
                'message' => 'Fax number must be 10 digits'
            )
        )        
    );
    
    public function add_provider($provider_array = NULL){
        if($provider_array == NULL){
            return FALSE;
        }
        
        if($this->save($provider_array,$validate = false)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    
    
}

?>

<?php

App::uses('AppModel', 'Model','AuthComponent');

class User extends AppModel {
    
    public $displayField = 'first_name';


    public $validate = array(
        
        'first_name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'First Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'First Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'First Name must be between 2 and 50 characters'
            )
        ),
        'last_name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Last Name is required'
            ),
            'alphaNumeric' => array(	
                'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
                'message' => 'Last Name is incorrectly formatted'
            ),
            'between' => array(
                'rule' => array('between', 2, 50),
                'message' => 'Last Name must be between 2 and 50 characters'
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
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Email already exists'
            )
        ),
        //password will be created after clicking a link on email
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Password is required'
            ),
            'between' => array(
                'rule' => array('between', 6, 18),
                'message' => 'Password must be between 6 and 18 characters'
            )
        )
    );
    
    //create db relationships
    public $belongsTo = array(
	//permission table
        'Permission' => array(
            'className' => 'Permission',
            'foreignKey' => 'permission_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    
    
    
    //before saving to USERS TABLE
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        //if user is saving a password . encrypt the password
        if(isset($this->data['User']['password'])){
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        
    }


    public function create_new_user($user_array = NULL){
        if($user_array == NULL){
            return FALSE;
        }
        //no validation in function - validate before using this function
        $user_array['User']['api_key'] = String::uuid();

        
        if($this->save($user_array,$validate = FALSE)){
//            $this->OutboundMail = ClassRegistry::init('OutboundMail');
//            $this->OutboundMail->create_register_email($this->id);
            return TRUE;            
            
        } else {
            $this->log('User Could Not Be Saved','User.create_new_user');
            return FALSE;
        }
    }
    
    public function update_user($user_array = NULL){
        if($user_array == NULL){
            return FALSE;
        }
        
        if(!isset($user_array['User']['id'])){
            return FALSE;
        }
        
        if(!$this->userExists($user_array['User']['id'])){
            return FALSE;
        }
        
        $this->set($user_array);
        $validate = array('fieldset' => array('first_name','last_name','email'));
        
        if($this->validates()){
            //save
        }
        
        
    }
    
    public function delete_user($user_id = NULL){
        if($user_id == NULL){
            return FALSE;
        }
        
        if(!$this->userExists($user_id)){
            return FALSE;
        }
        
        if(empty($user_id)){
            //delete user here
        }
    }
    
    //THIS CAN BE USED TO UPDATE PASSWORD TOO
    public function create_password($user_id,$password){
       
        if(!$this->userExists($user_id)){
            return FALSE;
        }
        
        $data = array();
        $data['User']['id'] = $user_id;
        $data['User']['password'] = $password;
        
        if($this->save($data)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function forgot_password($user_id = NULL){
        
        if($user_id == NULL){
            return FALSE;
        }
        
        if(!$this->userExists($user_id)){
            return FALSE;
        }
        
        $data = array();
        $data['User']['id'] = $user_id;
        $data['User']['forgot_password_key'] = String::uuid();
//        $data['User']['forgot_password_date'] = strtotime($time, $now);
        
        if($this->save($data)){
            //send email to reset password
            
            return TRUE;
        } else {
            return FALSE;
        }
        
        
        
        
    }
    
    //FIND IF A USER EXISTS
    public function userExists($user_id){
        
        $options = array(
            'fields' => array(
                'User.id'
            ),
            'conditions' => array(
                'User.id' => $user_id
            ),
            'recursive' => -1
        );
        
        $exists = $this->find('first',$options);
        
        if(empty($exists)){
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    
    public function returnUserStatus($user_id = NULL){
        if($user_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'User.status'
            ),
            'conditions' => array(
                'User.id' => $user_id
            ),
            'recursive' => -1
        );
        
        $user_status = $this->find('first',$options);
        
        if(empty($user_status)){
            return FALSE;
        }
        
        return $user_status['User']['status'];
        
    }
    
    public function returnUserIdFromApiKey($api_key = NULL){
        if($api_key == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'User.id'
            ),
            'conditions' => array(
                'User.api_key' => $api_key
            ),
            'recursive' => -1
        );
        
        $user_id = $this->find('first',$options);
        
        if(empty($user_id)){
            return FALSE;
        }
        
        return $user_id['User']['id'];
        
    }
    
    public function getUserArray($user_id){
        if($user_id == NULL){
            return FALSE;
        }
        
        $options = array(
            'fields' => array(
                'User.first_name',
                'User.last_name',
                'User.email',
                'User.status'
            ),
            'conditions' => array(
                'User.id' => $user_id
            ),
            'recursive' => -1
        );
        
        $user = $this->find('first',$options);
        
        if(empty($user)){
            return FALSE;
        }
        
        return $user;
        
    }
    
    public function createRegistrationEmail($user_id){
        if($user_id == NULL){
            return FALSE;
        }
            
        $options = array(
            'fields' => array(
                'User.first_name',
                'User.email'
            ),
            'conditions' => array(
                'User.id' => $user_id
            ),
            'recursive' => -1
        );
            
        $user = $this->find('first',$options);
            
        if(empty($user)){
            return FALSE;
        }
            
        $url = Configure::read('WEBURL');
        $temp_link = $url.'/users/activate_account/'.$user_id;
        $tiny_url = $temp_link;
            
        $replacements = array(
            '{{first_name}}' => $user['User']['first_name'],
            '{{tiny_url}}' => $tiny_url,
            '{{email}}' => $user['User']['email']
        );
        $this->log($replacements,'account');
        return $replacements;
    }
    
    
    
    
    
    
}

?>

<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    
    public function beforeFilter() {
        $this->Auth->allow('cloud_login', 'register','contact_us','about_us','advertising','activate_account');
    }

    public function cloud_login(){
        $this->theme = 'Backend';
        $this->layout = 'login';
        $this->Auth->allow();
        if($this->Auth->user('id')){
            $this->Session->setFlash(__('Already logged in'),'bk_success');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
        if($this->request->is('Post')){
            if($this->Auth->login()){
                $this->Session->setFlash(__('Logged in successfully'),'bk_success');
                return $this->redirect(array('action' => 'cloud_index'));
            } else {
                $this->Session->setFlash(__('Incorrect Email or Password'),'bk_error');
            }
            
            
        }
    }
    
    public function cloud_logout(){
        $this->Auth->logout();
        return $this->redirect(array('action' => 'cloud_login'));
    }
    
    public function logout(){
        $this->Auth->logout();
        return $this->redirect(array('action' => 'login'));
    }
    
    public function cloud_add_user(){

        $this->theme = 'Backend';
        $this->layout = 'admin';
        if($this->request->is('Post')){
            $this->User->set($this->request->data);
            $validate = array('fieldList' => array('first_name','last_name','email'));
            
            if($this->User->validates($validate)){
                //use function to create user
                if($this->User->create_new_user($this->request->data)){
                    $this->Session->setFlash(__('User has been saved'),'bk_success');
                    return $this->redirect(array('action' => 'cloud_index'));
                } else {
                    $this->Session->setFlash(__('User Could not be saved'),'bk_error');
                    return;
                }
            } else {
                $this->Session->setFlash(__('Validation Error'),'bk_warning');
                
            }
            
        }
        $this->Permission = ClassRegistry::init('Permission');
        $permissions = $this->User->Permission->find('list');
        $this->set(compact('permissions'));
        
    }
    
    public function cloud_index(){
//        $this->Session->setFlash(__('Logged in successfully'),'bk_success');
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $options = array(
            'fields' => array(
                'User.id',
                'User.first_name',
                'User.last_name',
                'User.api_key',
                'User.permission_id',
                'User.email',
                'User.status'
            ),
            'recursive' => -1
        );
        
        $users = $this->User->find('all',$options);
        
        //paginate the results
        $paginate = $this->Paginator->paginate();
        $this->set('users',$paginate);
        
    }
    
    public function cloud_addProviderUser(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($this->request->is('Post')){
            $user_id = $this->request->data['Data']['user_id'];
            $provider_id = $this->request->data['Data']['provider_id'];
            
            $this->ProviderUser = ClassRegistry::init('ProviderUser');
            if($this->ProviderUser->create_provider_user($user_id,$provider_id)){
                $this->Session->setFlash(__('User has been linked to Provider'),'bk_success');
                return $this->redirect(array('action' => 'cloud_index'));
            } else {
                $this->Session->setFlash(__('An error occured, user could not be linked'),'bk_error');
            }
            
        }
        
        $users = $this->User->find('list');
        $this->Provider = ClassRegistry::init('Provider');
        $providers = $this->Provider->find('list');
        $this->set(compact('users','providers'));
    }
    
    public function cloud_create_password($user_session = NULL){
        $this->theme = 'Backend';
        $this->layout = 'login';
        //CHECK IF PASSWORD IS NULL, IF SO, THROW AN ERROR

        if($user_session == NULL){
            $user_session = $this->Session->read('user_ses_id');
        } else {
            $this->Session->write('user_ses_id',$user_session);
        }
        //FIND THE USER AND CHECK IF TOKEN HAS EXPIRED
        $options = array(
            'fields' => array(
                'User.id',
                'User.forgot_password_date',
                'User.first_name',
                'User.status'
            ),
            'conditions' => array(
                'User.id' => $user_session,
                'User.status' => 0
            ),
            'recursive' => -1
        );
        //GET USER ID
        $user = $this->User->find('first',$options);
       //IF NO DATA IS FOUND, THR KEY MUST BE INCORRECT / DOES NOT EXIST
        if(empty($user)){
            $this->Session->setFlash(__('There was a problem retreiving your information. Please try again'), 'bk_error');
            return $this->redirect(array('action' => 'login')); 
        }
        
        //CHECK IF THE NEW PASSWORD HAS BEEN POSTED
         if($this->request->is('Post')){
             $password = $this->request->data['User']['password'];
             $confirm_password = $this->request->data['User']['confirm_password'];
             //IF PASSWORDS DONT MATCH, RETURN WITH AN ERROR
             if($password !== $confirm_password){
                 $this->Session->setFlash(__('Your passwords do not match, please try again'), 'bk_error');
                 $this->set('user', $user);
                 return $this->redirect('create_password/'.$user_session);  
             }
             //SET UP DATA ARRAY TO BE SAVED
             $data = array();
             //RESET FORGOT PASSWORD COLUMNS TO NULL
             $data['User']['id'] = $user['User']['id'];
             $data['User']['password'] = $password;
             $data['User']['status'] = 1;
             
             if($this->User->save($data,$validate = false)){
                 $this->Session->setFlash(__('Your password has been successfully changed'), 'bk_success');
                 return $this->redirect(array('action' => 'cloud_login'));
             } else {
                 $this->Session->setFlash(__('There was a problem saving your new password, please try again'), 'bk_error');
                 $this->set('user', $user);
                 return $this->redirect('create_password/'.$user_session);
             }
         }
        
        $this->set('user', $user);
        
    }
    
    


    public function login(){
        $this->theme = 'Frontend';
        $this->Auth->allow();
        if($this->Auth->user('id')){
            $this->Session->setFlash(__('Already logged in'));
            return $this->redirect(array('controller' => 'events','action' => 'my_events'));
        }
        
        if($this->request->is('Post')){
            if($this->Auth->login()){
                $this->Session->setFlash(__('Logged in successfully'));
                return $this->redirect(array('controller' => 'events','action' => 'my_events'));
            } else {
                $this->Session->setFlash(__('Incorrect Email or Password'));
            }
            
            
        }
    }
    
    public function register(){
        $this->theme = 'Frontend';
        //FRONT END REGISTER
        if($this->request->is('Post')){
            $this->User->set($this->request->data);
            $validate = array('fieldList' => array('first_name','last_name','email'));
            
            if($this->User->validates($validate)){
                $this->request->data['User']['permission_id'] = Configure::read('PERMISSION.STANDARD');
                //use function to create user
                if($this->User->create_new_user($this->request->data)){
                    
                    //CREATE PROVIDER USER
                    $this->Session->setFlash(__('Thank you for creating an account'));
                    return $this->redirect(array('controller' => 'events','action' => 'my_events'));
                } else {
                    $this->Session->setFlash(__('User Could not be saved'));
                    return;
                }
            } else {
                $this->Session->setFlash(__('Validation Error'));
            }
            
        }
        
        
    }
    
    public function activate_account($id = null){
        
        if($id == NULL){
            $this->Session->setFlash(__('We had a problem activating your account, please try again.'));
            return $this->redirect(array('action' => 'register'));
        }
        
        $options = array(
            'fields' => array(
                'User.id'
            ),
            'conditions' => array(
                'User.status' => 0,
                'User.id' => $id
            ),
            'recursive' => -1
        );
        
        $user = $this->User->find('first',$options);
        
        if(empty($user)){
            $this->set('response',FALSE);
            $this->Session->setFlash(__('We had a problem activating your account, please try again.'));
            return $this->redirect(array('action' => 'register'));
        }
        
        $data = array();
        $data['User']['id'] = $id;
        $data['User']['status'] = 1;
        
        $this->User->save($data,$validate = false);
        
        $this->Session->setFlash(__('Your account has been activated.'));
        return $this->redirect(array('action' => 'login'));
                
        
        
        
    }


    public function view_profile($id = NULL){
        $this->theme = 'Frontend';
        $current_user = $this->Auth->user('id');
        
        if($id == NULL || $current_user !== $id){
            // no permission to view this
        }
        
        $options = array(
            'fields' => array(
                'User.id',
                'User.first_name',
                'User.last_name',
                'User.email',
                'User.status'
            ),
            'conditions' => array(
                'User.id' => $current_user
            ),
            'recursive' => -1
        );
        
        $user = $this->User->find('first',$options);
                
        $this->set('user',$user);
        
    }
    
    public function edit_profile($id = NULL){
        $this->theme = 'Frontend';
        $current_user = $this->Auth->user('id');
        
        if($id == NULL || $current_user !== $id){
            // no permission to view this
            // redirect
        }
        
        if($this->request->is('Post') || $this->request->is('Put')){
            $this->request->data['User']['id'] = $id;
            if($this->request->data['User']['password'] !== $this->request->data['User']['confirm_password']){
                $this->User->validationErrors['password'] = "Password do not match";
                $this->User->validationErrors['confirm_password'] = "Password do not match";
            } else {
                $this->User->set($this->request->data);
                $validate = array('fieldList' => array('first_name','last_name','email'));
                 if($this->User->validates($validate)){
                     if($this->User->create_new_user($this->request->data)){
                        $this->Session->setFlash(__('Your account has been updated'));
                        return $this->redirect(array('action' => 'view_profile',$id));
                    } else {
                        $this->Session->setFlash(__('Your details could not be saved'));
                    }
                     
                 }
            }
            
            debug($this->request->data);
            
        } else {
            $options = array(
                'fields' => array(
                    'User.id',
                    'User.first_name',
                    'User.last_name',
                    'User.email',
                    'User.status'
                ),
                'conditions' => array(
                    'User.id' => $current_user
                ),
                'recursive' => -1
            );

            $this->request->data = $this->User->find('first',$options);
        }
        
        $this->set('user',$this->request->data);
        
    }
}

?>

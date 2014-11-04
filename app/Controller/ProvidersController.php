<?php
App::uses('AppController', 'Controller');

class ProvidersController extends AppController {
    
    public function cloud_index(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $options = array(
            'fields' => array(
                'Provider.id',
                'Provider.name',
                'Provider.contact_name',
                'Provider.email',
                'Provider.website'
            ),
            'recursive' => -1
        );
        
        $providers = $this->Provider->find('all',$options);
        
        //paginate the results
        $paginate = $this->Paginator->paginate();
        $this->set('providers',$paginate);
    }
    
    public function cloud_view($id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        if($id == NULL){
            //redirect
        }
        
        $options = array(
            'fields' => array(
                'Provider.id',
                'Provider.name',
                'Provider.description',
                'Provider.contact_name',
                'Provider.email',
                'Provider.website',
                'Provider.phone',
                'Provider.fax',
                'Provider.logo',
                'Provider.address_line_one',
                'Provider.address_line_two',
                'Provider.city_id',
                'Provider.province_id',
                'Provider.country_id',
                'Provider.status',
                'Provider.created'
            ),
            'conditions' => array(
                'Provider.id' => $id
            ),
            'recursive' => -1
        );
        
        $provider = $this->Provider->find('first',$options);
        
        //get provider users
        
        
        $this->set('provider', $provider);
    }
    
    public function cloud_add(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        $this->log('test','provider_add');
        if($this->request->is('Post')){
            
            $this->Provider->set($this->request->data);
            $validate = array('fieldList' => array('name','description','contact_name','email','phone','fax','website'));
            
            if($this->Provider->validates($validate)){
                $this->request->data['Provider']['country_id'] = $this->request->data['c']['country_id'];
                $this->request->data['Provider']['province_id'] = $this->request->data['c']['province_id'];
                $this->request->data['Provider']['city_id'] = $this->request->data['c']['city_id'];
                if($this->Provider->add_provider($this->request->data)){
                    $this->Session->setFlash(__('Provider has been saved'),'bk_success');
                    return $this->redirect(array('action' => 'cloud_index'));
                } else {
                    $this->Session->setFlash(__('Provider could not be saved'),'bk_error');
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
    
    public function add_provider(){
        //front end add provider
        //get_user_id
        //once user has a provider they do not need to add one again - first check
        $this->ProviderUser = ClassRegistry::init('ProviderUser');
        debug($this->Auth->user('id'));
        $provider_id = $this->ProviderUser->getProviderUserId($this->Auth->user('id'));
        if(!$provider_id){
            if($this->request->is('Post')){
                //POST HERE
                $this->Provider->set($this->request->data);
                $validate = array('fieldList' => array('name','description','contact_name','email','phone','fax','website'));

                if($this->Provider->validates($validate)){
                    //save
                    //save relationship too
                    
                    $this->Session->setFlash(__('Your details have been saved'));
                    return;
                }

                
            }
        } else {
            //go to edit provider
            $this->Session->setFlash(__('You already added your Provider Details'));
            return $this->redirect(array('action' => 'view_provider',$provider_id));;
        }
        
        
    }
    
    public function view_provider($id = NULL){
        //front end view provider
        if($id == NULL){
            $this->Session->setFlash(__('You need to create a provider'));
            return $this->redirect(array('action' => 'add_provider'));
        }
        $options = array(
            'fields' => array(
                'Provider.id',
                'Provider.name',
                'Provider.description',
                'Provider.contact_name',
                'Provider.email',
                'Provider.website',
                'Provider.phone',
                'Provider.fax',
                'Provider.logo',
                'Provider.address_line_one',
                'Provider.address_line_two',
                'Provider.country_id',
                'Provider.province_id',
                'Provider.city_id',
                'Provider.status'
            ),
            'conditions' => array(
                'Provider.id' => $id
            ),
            'recursive' => -1
        );
        
        $provider_details = $this->Provider->find('first',$options);
        
        if(empty($provider_details)){
            $this->Session->setFlash(__('You need to create a provider'));
            return $this->redirect(array('action' => 'add_provider'));
        }
        
        $this->set('provider',$provider_details);
        
    }
    
    public function edit_provider($id = NULL){
        //edit provider
    }
    
}

?>

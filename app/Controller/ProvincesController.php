<?php
App::uses('AppController', 'Controller');

class ProvincesController extends AppController {
    
    public function cloud_getByCountry(){
        $country_id = $this->request->data['c']['country_id'];
        
        $options = array(
          'conditions' => array(
              'Province.country_id' => $country_id
          ),
          'recursive' => -1
        );
        
        $provinces = $this->Province->find('list', $options);
        
        $this->set('provinces',$provinces);
        $this->layout = 'ajax';
        
    }
    
    
    
}

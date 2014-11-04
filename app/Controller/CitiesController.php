<?php
App::uses('AppController', 'Controller');

class CitiesController extends AppController {
    
    public function getByProvince(){
        $this->layout = 'ajax';
        $province_id = $this->request->data['Venue']['province_id'];
        
        $options = array(
          'conditions' => array(
              'City.province_id' => $province_id
          ),
          'recursive' => -1
        );
        
        $cities = $this->City->find('list', $options);
        
        $this->set('cities',$cities);
        
        
    }
    
}

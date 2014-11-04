<?php
App::uses('AppModel', 'Model');

class UrlType extends AppModel{
    
    public function getAllUrlTypes(){
        //get list
        return $this->find('list');
        
    }
    
    
}

?>

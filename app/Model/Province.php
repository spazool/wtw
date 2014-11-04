<?php
App::uses('AppModel', 'Model');

class Province extends AppModel {
    //put your code here
    public function getProvinceList(){
        
        $options = array(
            'order' => array(
                'Province.name' => 'asc'
            )
        );
        
        return $this->find('list',$options);
        
        
    }
    
    
}

?>


<?php
App::uses('AppModel', 'Model');

class Category extends AppModel{
    //put your code here
    
    //get category list
    
    public function getCategoryList(){
        
        $options = array(
            'order' => array(
                'Category.name' => 'asc'
            )
        );
        
        return $this->find('list',$options);
        
        
    }

    public function findCategoryNameById($id) {
        $category = $this->find('first', array('conditions' => array('id' => $id)));
        return $category['Category']['name'];
    }
    
    
}

?>

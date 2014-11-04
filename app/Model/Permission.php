<?php

App::uses('AuthComponent','Controller/Component','AppModel', 'Model');

class Permission extends AppModel {
    
    public $displayField = 'name';
    
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'permission_id',
            'dependent' => false
        )
    );
    
}

?>

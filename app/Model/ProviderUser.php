<?php
App::uses('AppModel', 'Model');

class ProviderUser extends AppModel {
    
    public function create_provider_user($user_id,$provider_id){
        
        $options = array(
            'fields' => array(
                'ProviderUser.id'
            ),
            'conditions' => array(
                'ProviderUser.user_id' => $user_id,
                'ProviderUser.provider_id' => $provider_id
            ),
            'recursive' => -1
        );
        
        $exists = $this->find('first',$options);
        
        if(!empty($exists)){
            return TRUE;
        }
        
        $options = array(
            'fields' => array(
                'ProviderUser.id'
            ),
            'conditions' => array(
                'ProviderUser.provider_id' => $provider_id,
                'ProviderUser.owner' => 1
            ),
            'recursive' => -1
        );
        
        $prouser = $this->find('first',$options);
        
        if(empty($prouser)){
            $owner = 1;
        } else {
            $owner = 0;
        }
        
        $data = array();
        $data['ProviderUser']['user_id'] = $user_id;
        $data['ProviderUser']['provider_id'] = $provider_id;
        $data['ProviderUser']['owner'] = $owner;
        
        if($this->save($data)){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function getProviderUserId($user_id){
        $options = array(
            'fields' => array(
                'ProviderUser.id',
                'ProviderUser.provider_id'
            ),
            'conditions' => array(
                'ProviderUser.user_id' => $user_id
            ),
            'recursive' => -1
        );
        
        $proUser = $this->find('first',$options);
        
        if(empty($proUser)){
            return FALSE;
        }
        
        return $proUser['ProviderUser']['provider_id'];
    }
    
    
}

?>

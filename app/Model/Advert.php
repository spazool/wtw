<?php

App::uses('AppModel', 'Model');

class Advert extends AppModel {
    
    public function getRandomAds(){
        $options = array(
            'fields' => array(
                'Advert.id',
                'Advert.destination',
                'Advert.file'
            ),
            'conditions' => array(
                'Advert.status' => 1
            ),
            'order' => 'rand()',
            'limit' => 3
        );
        
        $ads = $this->find('all',$options);
        
        return $ads;
    }
    
    public function addImpression($id){
        
        $options = array(
            'fields' => array(
                'Advert.id',
                'Advert.impressions'
            ),
            'conditions' => array(
                'Advert.id' => $id
            )
        );
        
        $ad = $this->find('first',$options);
        $impressions = $ad['Advert']['impressions'];
        $impressions++;
        $data = array();
        $data['Advert']['id'] = $id;
        $data['Advert']['impressions'] = $impressions;
        
        $this->save($data);
        
        return;
    }
    
    public function addClick($id){
        $options = array(
            'fields' => array(
                'Advert.id',
                'Advert.clicks'
            ),
            'conditions' => array(
                'Advert.id' => $id
            )
        );
        
        $ad = $this->find('first',$options);
        $clicks = $ad['Advert']['clicks'];
        $clicks++;
        $data = array();
        $data['Advert']['id'] = $id;
        $data['Advert']['clicks'] = $clicks;
        
        $this->save($data);
        
        return;
    }
    
    
    
}

?>

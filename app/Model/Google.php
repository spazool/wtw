<?php

App::uses('AppModel', 'Model');

class Google extends AppModel {
    
    var $useTable = false;
    
    public function getAddressCoordinates($address = NULL){
        
        if($address == NULL){
            return FALSE;
        }
        
        $address = str_replace(' ', '+', urlencode($address));
        
        $this->Apikey = ClassRegistry::init('Apikey');
        $api_info = $this->Apikey->getGoogleMapsAuth();
        $url = $api_info['Apikey']['url'];
        $api_key = $api_info['Apikey']['api_key'];
        
        if(empty($url)){
            $this->log('Empty API data... this is strange, check it out','Google_api');
            return FALSE;
            
        }
        
        $url = $url.$address.'$sensor=false&key='.$api_key;
       
        App::uses('HttpSocket', 'Network/Http');
        
        $HttpSocket = new HttpSocket();
        
        $result = $HttpSocket->get($url);
        
        $json = $result->body();
        $json = json_decode($json, true);
        
        if(!isset($json['status'])){
            return FALSE;
        }
        
        if($json['status'] !== 'OK'){
            $this->log('NO STATUS OK - THIS SHOULD NOT HAPPEN','Google_api');
            return FALSE;
            
        }
        
        
        $lat = $json['results'][0]['geometry']['location']['lat'];
        $long = $json['results'][0]['geometry']['location']['lng'];
        
        $return_array['lat'] = $lat;
        $return_array['long'] = $long;
        
        return $return_array;
    }
    
    
    
}

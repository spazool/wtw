<?php
class StatusHelper extends AppHelper {
    
    public $helpers = array();
    
    public function translatePermissionStatus($id = NULL){
        
        if($id == NULL){
            return 'No Perm';
        }
        
        if($id == Configure::read('PERMISSION.SUPERUSER')){
            return 'SuperUser';
        }
        
        if($id == Configure::read('PERMISSION.STANDARD')){
            return 'Standard';
        }
        
        
    }
    
    public function translateUserStatus($status = NULL){
        
        if($status == NULL){
            return 'Unknown';
        }
        
        switch ($status){
            case 0:
                return 'Inactive';
            case 1:
                return 'Active';
        }
    }
    
    public function translateCity($city = NULL){
        if($city == NULL){
            return 'Unknown';
        }
        
        $this->City = ClassRegistry::init('City');
        
        $options = array(
            'fields' => array(
                'City.name'
            ),
            'conditions' => array(
                'City.id' => $city
            ),
            'recursive' -1
        );
        
        $cities = $this->City->find('first',$options);
        
        if(empty($cities)){
            return 'Unknown';
        }
        
        return $cities['City']['name'];
        
    }
    
    public function translateProvince($province = NULL){
        if($province == NULL){
            return 'Unknown';
        }
        
        $this->Province = ClassRegistry::init('Province');
        
        $options = array(
            'fields' => array(
                'Province.name'
            ),
            'conditions' => array(
                'Province.id' => $province
            ),
            'recursive' -1
        );
        
        $provinces = $this->Province->find('first',$options);
        
        if(empty($provinces)){
            return 'Unknown';
        }
        
        return $provinces['Province']['name'];
        
    }
    
    public function translateCountry($country = NULL){
        if($country == NULL){
            return 'Unknown';
        }
        
        $this->Country = ClassRegistry::init('Country');
        
        $options = array(
            'fields' => array(
                'Country.name'
            ),
            'conditions' => array(
                'Country.id' => $country
            ),
            'recursive' -1
        );
        
        $countries = $this->Country->find('first',$options);
        
        if(empty($countries)){
            return 'Unknown';
        }
        
        return $countries['Country']['name'];
        
    }
    
    public function translateVenueType($type = NULL){
        
        switch ($type) {
            case 1:
                return 'Closed';
                break;
            case 2:
                return 'Open';
                break;
            default:
                return 'Unknown';
                break;
        }
    }
    
    public function translateCategories($category_id = NULL){
        
        if($category_id == NULL){
            return 'Unknown';
        }
        
        $this->Category = ClassRegistry::init('Category');
        
        $options = array(
            'fields' => array(
                'Category.name'
            ),
            'conditions' => array(
                'Category.id' => $category_id
            ),
            'recursive' => -1
        );
        
        $category = $this->Category->find('first',$options);
        
        if(empty($category)){
            return 'Unknown';
        }
        
        return $category['Category']['name'];
        
        
    }
    
    public function translateProvider($provider_id = NULL){
        if($provider_id == NULL){
            return 'Unknown';
        }
        
        $options = array(
            'fields' => array(
                'Provider.name'
            ),
            'conditions' => array(
                'Provider.id' => $provider_id
            ),
            'recursive' => -1
        );
        
        $this->Provider = ClassRegistry::init('Provider');
        
        $provider = $this->Provider->find('first',$options);
        
        if(empty($provider)){
            return 'Unknown';
        }
        
        return $provider['Provider']['name'];
        
    }
    
}


?>

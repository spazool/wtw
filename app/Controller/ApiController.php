<?php

App::uses('AppController', 'Controller');

class ApiController extends AppController {
    
    //API TO REGISTER USER
    public function register_user(){
        if($this->Api->is('Post')){
            $data = $this->request->data;
            
            if(empty($data)){
                return FALSE;
            }
            
            $this->log($data,'register_user');
            
            //put everything into $data var
            
        }
        
        //return error here
        
        
    }
    
    
    
    
}

?>

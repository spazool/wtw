<?php
App::uses('AppController', 'Controller');
//start class
class LandingsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('landing','contact_us');
    }
    //this is the pages to manage
    public function landing(){
     
        //just display here
    }
    
    public function contact_us(){
        
        
        
        if($this->request->is('Post')){
            //do what you need to do, validate the data and shit
            $data = $this->request->data;
//            if(empty($data)){
//                return;
//                $message = 'No Data Added';
//            }
            
            $this->Landing->set($data);
            $validate = array('fieldList' => array('fullname','email','mobile','message'));
            if($this->Landing->validates($validate)){
                
//                $html = 'Full Name: '.$data['Landing']['fullname'].'</br> '
                //send email
                App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail('smtp');
                $Email->from(array('info@wheresthewine.co.za' => 'Wheres the wine site'));
                $Email->to('sales@wheresthewine.co.za');
                $Email->emailFormat('html');
                $Email->subject('Website');
                $Email->send($data['Landing']['fullname'].'<br/>'.
                                $data['Landing']['subject'].'<br/>'.
                                $data['Landing']['email'].'<br/>'.
                                $data['Landing']['mobile'].'<br/>'.
                                $data['Landing']['message'].'<br/>');
                //redirect to home
                $this->Session->setFlash(__('Your message has been sent'));
                return $this->redirect(array('action' => 'contact_us'));
            }
            debug($data);
        }
        
        
        
        
        $subject = array(
            'Advertising' => 'Advertising',
            'Event_listing' => 'Event listing',
            'General_enquiry' => 'General enquiry',
            'Comments_suggestions' => 'Comments and suggestions'
        );
        
        $this->set('subject',$subject);
        
        //set array here
        
    }
}

?>

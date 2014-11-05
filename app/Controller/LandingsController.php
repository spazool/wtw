<?php

App::uses('AppController', 'Controller');

//start class
class LandingsController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('landing', 'contact_us');
  }

  //this is the pages to manage
  public function landing() {

    //just display here
  }

  public function contact_us() {



    if ($this->request->is('Post')) {
      //do what you need to do, validate the data and shit
      $data = $this->request->data;
//            if(empty($data)){
//                return;
//                $message = 'No Data Added';
//            }

      $this->Landing->set($data);
      $validate = array('fieldList' => array('fullname', 'email', 'mobile', 'message'));
      if ($this->Landing->validates($validate)) {

//                $html = 'Full Name: '.$data['Landing']['fullname'].'</br> '
        //send email
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail('smtp');
        //$Email->from(array('info@wheresthewine.co.za' => 'Wheres the Wine site'));
        $Email->sender('info@wheresthewine.co.za', "Wheres the Wine");
        $Email->to('sales@wheresthewine.co.za');
        $Email->emailFormat('html');
        $Email->subject('[WTW] ' . $data['Landing']['subject']);
        $Email->send('Hi,<br/><br/>The following person filled out the contact form on the Where’s the Wine website:<br/> ' .
                '<br/>' .
                'Name: ' . $data['Landing']['fullname'] . '<br/>' .
                'Email: ' . $data['Landing']['email'] . '<br/>' .
                'Telephone: ' . $data['Landing']['mobile'] . '<br/>' .
                'Message: ' . $data['Landing']['message'] . '<br/>' .
                '<br/><br/>' .
                'Regards, WTW Web');
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

    $this->set('subject', $subject);

    //set array here
  }

}

?>

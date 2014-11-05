<?php

App::uses('AppModel', 'Model');

class Organiser extends AppModel {

  //validation needed
  public $validate = array(
      'organiser_name' => array(
          'alphaNumeric' => array(
              'rule' => array('custom', "/^[a-z0-9 @$&',@-]*$/i"),
              'message' => 'Company Name is incorrectly formatted',
              'allowEmpty' => true,
              'required' => false
          ),
          'between' => array(
              'rule' => array('between', 2, 100),
              'message' => 'Event Name must be between 2 and 100 characters'
          )
      ),
      'email' => array(
          'email' => array(
              'rule' => 'email',
              'message' => 'A valid email address must be supplied',
              'allowEmpty' => true,
              'required' => false
          )
      ),
      'website' => array(
          'rule' => array('url', true),
          'message' => 'Please enter a valid URL (e.g. http://mysite.com)',
          'allowEmpty' => true,
          'required' => false
      )
  );

  public function createOrganiser($insert_data = NULL) {

    if ($insert_data == NULL) {
      return FALSE;
    }

    if ($this->save($insert_data, $validate = FALSE)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function editOrganiser($insert_data = NULL) {

    if ($insert_data == NULL) {
      return FALSE;
    }

    if ($this->save($insert_data, $validate = FALSE)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function findEventOrganiser($event_id = NULL) {

    if ($event_id == NULL) {
      return FALSE;
    }

    $options = array(
        'fields' => array(
            'Organiser.id',
            'Organiser.organiser_name',
            'Organiser.contact_name',
            'Organiser.telephone',
            'Organiser.email',
            'Organiser.website'
        ),
        'conditions' => array(
            'Organiser.event_id' => $event_id
        ),
        'recursive' => -1
    );

    $organisers = $this->find('first', $options);

    if (!empty($organisers)) {
      return $organisers;
    } else {
      return FALSE;
    }
  }

}

?>

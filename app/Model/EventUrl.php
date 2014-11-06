<?php

App::uses('AppModel', 'Model');

class EventUrl extends AppModel {

  public $validate = array(
      'name' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Website Name is required'
          ),
          'alphaNumeric' => array(
              'rule' => array('custom', "/^[a-z0-9 @$&',@-]*$/i"),
              'message' => 'Website Name is incorrectly formatted'
          ),
          'between' => array(
              'rule' => array('between', 2, 50),
              'message' => 'Website Name must be between 2 and 50 characters'
          )
      ),
      'url' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Website URL is required'
          ),
          'url' => array(
              'rule' => array('url', true),
              'message' => 'Please enter a valid url: http://www.example.com',
              'allowEmpty' => true,
              'required' => false
          )
      )
  );

  public function createEventUrl($insert_data = NULL) {

    if ($insert_data == NULL) {
      return FALSE;
    }

    if ($this->save($insert_data)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function deleteEventUrl($id = NULL) {

    if ($id == NULL) {
      return FALSE;
    }

    $options = array(
        'fields' => array(
            'EventUrl.id'
        ),
        'conditions' => array(
            'EventUrl.id' => $id
        ),
        'recursive' => -1
    );

    $exists = $this->find('first', $options);

    if (empty($exists)) {
      return TRUE;
    }

    if ($this->delete($id)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function findUrlsByEvent($event_id = NULL) {
    if ($event_id == NULL) {
      return FALSE;
    }

    $options = array(
        'fields' => array(
            'EventUrl.id',
            'EventUrl.name',
            'EventUrl.url',
            'EventUrl.url_type_id'
        ),
        'conditions' => array(
            'EventUrl.event_id' => $event_id
        ),
        'recursive' => -1
    );

    $event_urls = $this->find('all', $options);

    if (!empty($event_urls)) {
      return $event_urls;
    } else {
      return FALSE;
    }
  }

}

?>

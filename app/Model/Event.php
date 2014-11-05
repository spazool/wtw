<?php

App::uses('AppModel', 'Model');

class Event extends AppModel {

  //validation needs to be done
  public $validate = array(
      'name' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Event Name is required'
          ),
          'alphaNumeric' => array(
              'rule' => array('custom', "/^[a-z0-9 '-]*$/i"),
              'message' => 'Event Name is incorrectly formatted'
          ),
          'between' => array(
              'rule' => array('between', 2, 100),
              'message' => 'Event Name must be between 2 and 100 characters'
          )
      ),
      'description' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Description is required'
          ),
          'between' => array(
              'rule' => array('between', 2, 5000),
              'message' => 'Description must be between 2 and 5000 characters'
          )
      ),
      'start_date' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Date is required'
          ),
          'date' => array(
              'rule' => array('date', 'ymd'),
              'message' => 'You must provide a deadline in YYYY-MM-DD format.',
              'allowEmpty' => true
          )
      ),
      'end_date' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Date is required'
          ),
          'date' => array(
              'rule' => array('date', 'ymd'),
              'message' => 'You must provide a deadline in YYYY-MM-DD format.',
              'allowEmpty' => true
          ),
          'compareDates' => array(
              'rule' => 'compareDates',
              'message' => 'Your event cannot end before it starts'
          )
      ),
      'start_time' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Start time is required'
          ),
          'time' => array(
              'rule' => array('time', 'hh:mm'),
              'message' => 'Please enter a valid time'
          )
      ),
      'end_time' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'End time is required'
          ),
          'time' => array(
              'rule' => array('time', 'hh:mm'),
              'message' => 'Please enter a valid time'
          )
      ),
      'email' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Email Address is required'
          ),
          'email' => array(
              'rule' => 'email',
              'message' => 'A valid email address must be supplied'
          )
      ),
      'telephone' => array(
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'required' => true,
              'message' => 'Phone number is required'
          ),
          'numeric' => array(
              'rule' => 'numeric',
              'message' => 'Please enter a valid phone number'
          ),
          'length' => array(
              'rule' => array('minLength', 10),
              'message' => 'Phone number must be 10 digits'
          )
      )
  );

  public function compareDates() {
    if ($this->data['Event']['end_date'] < $this->data['Event']['start_date']) {
      return FALSE;
    }

    return TRUE;
  }

  public function getAllEvents() {
    
  }

  public function generateRefNumber() {
    $ref_number = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $ref_number = '#' . $ref_number;

    $count = $this->find('Count', array('conditions' => array('Event.reference' => $ref_number)));

    if ($count !== 0) {
      $ref_number = $this->generateRefNumber();
    }

    return $ref_number;
  }

  public function createEvent($insert_array = NULL) {
    if ($insert_array == NULL) {
      return FALSE;
    }

    //create ref

    if ($this->save($insert_array, $validate = FALSE)) {
      return TRUE;
    }

    //save urls
    //save organiser
    //if existing venue - create link 
    //else create venue and create link venue as closed not open
    //create ratings link
    //save ticket prices
  }

  public function findEventById($event_id) {

    $options = array(
        'fields' => array(
            'Event.id',
            'Event.name',
            'Event.description',
            'Event.start_date',
            'Event.end_date',
            'Event.start_time',
            'Event.end_time',
            'Event.end_date',
            'Event.email',
            'Event.telephone',
            'Event.category_id',
            'Event.image',
            'Event.reference'
        ),
        'conditions' => array(
            'Event.id' => $event_id
        ),
        'recursive' => -1
    );

    $event = $this->find('first', $options);

    return $event;
  }

  public function returnTimes() {

    $times = array();
    for ($hours = 0; $hours < 24; $hours++) { // the interval for hours is '1'
      for ($mins = 0; $mins < 60; $mins+=15) { // the interval for mins is '30' {}
        $times[] = str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($mins, 2, '0', STR_PAD_LEFT);
      }
    }

    return $times;
  }

  public function setEventImage($img) {
    if ($img == "") {
      $image = $this->returnRandomImage();
    } else {
      $image = $img;
    }

    return $image;
  }

  public function returnRandomImage() {
    $image = 'event_' . rand(1, 10) . '.jpg';
    return $image;
  }

  public function createImages($id, $imageArray, $path, $sizes_array = NULL) {

    if ($sizes_array == NULL) {
      $sizes_array[0] = 64;
    }

    $name = $imageArray['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $imageArray['name'] = $id . '.' . $extension;
    $newname = $imageArray['name'];
    $filePath = WWW_ROOT . $path . $newname;

    unlink(WWW_ROOT . $path . $newname);
    move_uploaded_file($imageArray['tmp_name'], $filePath);

    $image_name = $newname;

    return $image_name;
  }

}

?>

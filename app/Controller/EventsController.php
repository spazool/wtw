<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {
    
    public $components = array('Paginator');

    public function beforeFilter() {
        $this->Auth->allow('index','list_events','view','search_events','events_filter','save_rating');
    }
    
    public function cloud_index(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $this->Paginator->settings = array(
            'conditions' => array('Event.end_date >=' => date("Y-m-d",strtotime('NOW')))
        );
        
        $paginate = $this->Paginator->paginate();
        $this->set('events',$paginate);
    }
    
    public function cloud_past_events(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        
        $this->Paginator->settings = array(
            'conditions' => array('Event.end_date <' => date("Y-m-d",strtotime('NOW')))
        );
        
        $paginate = $this->Paginator->paginate();
        $this->set('events',$paginate);
    }
    
    public function cloud_add_event(){
        $this->theme = 'Backend';
        $this->layout = 'admin';
 
       if ($this->request->is('post') || $this->request->is('put')){
            
            $data = $this->request->data;
            $date_to_from = str_replace(' ', '', $data['Event']['date_to_from']);
            unset($data['Event']['date_to_from']);
            $date_to_from = explode('-', $date_to_from);
            $dateTime = DateTime::createFromFormat('d/m/Y', $date_to_from[0]);
            $data['Event']['start_date'] = $dateTime->format('Y-m-d');
            $dateTime = DateTime::createFromFormat('d/m/Y', $date_to_from[1]);
            $data['Event']['end_date'] = $dateTime->format('Y-m-d');
            $data['Event']['start_time'] = DATE("H:i", STRTOTIME($data['Event']['start_time']));
            $data['Event']['end_time'] = DATE("H:i", STRTOTIME($data['Event']['end_time']));
            
            $this->Event->set($data);
            $validate = array('name','description','start_date','end_date','start_time','end_time','email','telephone');
            if($this->Event->validates($validate)){
                if($this->Event->save($data)){
                $this->Session->setFlash(__('Event has been saved'),'bk_success');
                return $this->redirect(array('action' => 'cloud_index'));
            }
            $this->Session->setFlash(__('Event could not be saved'),'bk_error');
            }
            
            $this->Session->setFlash(__('Validation Errors'),'bk_error');
        }
        
        $this->Category = ClassRegistry::init('Category');
        $categories = $this->Category->find('list');
        $this->Provider = ClassRegistry::init('Provider');
        $providers = $this->Provider->find('list');
        $this->set(compact('categories','providers'));
                
    }
    
    public function cloud_view_event($id = NULL){
        $this->theme = 'Backend';
        $this->layout = 'admin';
        if($id == NULL){
            $this->Session->setFlash(__('Event could not be found'),'bk_error');
            return $this->redirect(array('action' => 'cloud_index'));
        }
        
        $options = array(
            'fields' => array(
                'Event.id',
                'Event.name',
                'Event.description',
                'Event.start_date',
                'Event.end_date',
                'Event.start_time',
                'Event.end_time',
                'Event.email',
                'Event.telephone',
                'Event.reference',
                'Event.category_id',
                'Event.provider_id'
            ),
            'conditions' => array(
                'Event.id' => $id
            ),
            'recursive' => -1
        );
        
        $event = $this->Event->find('first',$options);
        $this->set('event',$event);
        
        //get Venue
        $this->Venue = ClassRegistry::init('Venue');
        $venue = $this->Venue->getVenueForEvent($id);
        if($venue){
            $this->set('venue',$venue);
        }
        
        //get organiser for event
        $this->Organiser = ClassRegistry::init('Organiser');
        $organiser = $this->Organiser->findEventOrganiser($id);
        if($organiser){
            $this->set('organiser',$organiser);
        }
        
        //TICKETS CAN BE MULITPLE TICKETS
        $this->Ticket = ClassRegistry::init('Ticket');
        $tickets = $this->Ticket->findTicketsForEvent($id);
        if($tickets){
            $this->set('tickets',$tickets);
        }
        
        //get URLS
        $this->EventUrl = ClassRegistry::init('EventUrl');
        $urls = $this->EventUrl->findUrlsByEvent($id);
        if($urls){
            $this->set('urls',$urls);
        }
        
        
    }


    public function cloud_renderElement($count){
        $this->autoRender = false;
        $this->layout = false; 
        $this->log($count,'element');
        $this->set(compact('count'));
        return $this->render('/Elements/tickets/tickets');
    }
    
    public function cloud_renderVenueElement($number){
        $this->autoRender = false;
        $this->layout = false;
        
        if($number == 1) {
            $this->Country = ClassRegistry::init('Country');
            $countries = $this->Country->find('list');
            $this->set(compact('countries'));
            return $this->render('/Elements/venues/newVenue');
        } else {
            $this->Venue = ClassRegistry::init('Venue');
            $venues = $this->Venue->find('list');
            $this->set(compact('venues'));
            return $this->render('/Elements/venues/existingVenue');
        }
        
        
    }
    
    public function add_event(){
        
        $this->theme = 'Frontend';
        
        
        //check if current user has a provider account
        
        
        if($this->request->is('Post')){
            $this->request->data['Event']['provider_id'] = $this->Auth->user('id');
            
            $this->Event->set($this->request->data);
            $validate = array('fieldList' => array('name','description','start_date','end_date','start_time','end_time','email','telephone'));
            //create validate array
            if($this->Event->validates($validate)){
                //save here
                //generate ref:
                $random = substr(number_format(time() * mt_rand(),0,'',''),0,6);
                $reference = 'REF'.$random;
                $this->request->data['Event']['reference'] = $reference;
                if($this->Event->save($this->request->data)){
                    //ADD TO PROVIDER ACCOUNT
                    $id = $this->Event->id;
                    return $this->redirect(array('action' => 'view_event', $id));
                    debug($this->request->data);
                    
                    //generate ref..
                } else {
                    $this->Session->setFlash(__('Could not save'));
                }
//                debug($this->request->data);
                //redirect to view_event
            } else {
                $this->Session->setFlash(__('Validation error'));
                
            }
            
            
            
        }

        $times = $this->Event->returnTimes();
        $times_dropdown = array_combine($times, $times); 
        
        //get categories
        $this->Category = ClassRegistry::init('Category');
        $categories = $this->Category->find('list');
        $this->set(compact('categories', 'times_dropdown'));
        
    }
    
    public function edit_event($id = NULL){
        //must be logged in
        $this->theme = 'Frontend';
        
        if($this->request->is('Put')){
            $this->request->data['Event']['provider_id'] = $this->Auth->user('id');
            $this->request->data['Event']['id'] = $id;
            $this->Event->set($this->request->data);
            $validate = array('fieldList' => array('name','description','start_date','end_date','start_time','end_time','email','telephone'));
            //create validate array
            if($this->Event->validates($validate)){
                //save here
                if($this->Event->save($this->request->data)){
                    //ADD TO PROVIDER ACCOUNT
                    return $this->redirect(array('action' => 'view_event', $id));
                    debug($this->request->data);
                    
                    //generate ref..
                } else {
                    $this->Session->setFlash(__('Could not save'));
                }
//                debug($this->request->data);
                //redirect to view_event
            } else {
                $this->Session->setFlash(__('Validation error'));
                
            }
            
        }
        
        
        $times = $this->Event->returnTimes();
        $times_dropdown = array_combine($times, $times); 
        
        $this->request->data = $this->Event->find('first',array('conditions' => array('Event.id' => $id)));
        $this->set($this->request->data);
        //get categories
        $this->Category = ClassRegistry::init('Category');
        $categories = $this->Category->find('list');
        $this->set(compact('categories', 'times_dropdown'));
    }
    
    public function index(){
        $this->theme = 'Frontend';
        //HOME PAGE
        //EVENTS
        $options = array(
            'joins' => array(
                array(
                    'table' => 'event_venues',
                    'alias' => 'EventVenue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Event.id = EventVenue.event_id'
                    )
                ),
                array(
                    'table' => 'venues',
                    'alias' => 'Venue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Venue.id = EventVenue.venue_id'
                    )
                ),
                array(
                    'table' => 'tickets',
                    'alias' => 'Ticket',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Ticket.event_id = Event.id'
                    )
//                    'limit' => 1
                )
            ),
            'fields' => array(
                'Event.id',
                'Event.name',
                'Event.description',
                'Event.start_date',
                'Event.end_date',
                'Event.start_time',
                'Event.end_time',
                'Event.image',
                'Venue.name',
                'Venue.description',
                'Venue.longitude',
                'Venue.latitude',
                'Ticket.price'
            ),
            'conditions' => array(
                'Event.status' => 1,
                'Event.end_date >=' => date("Y-m-d H:i:s",strtotime('NOW'))
            ),
            'order' => 'Event.start_date',
            'group' => 'Event.id',
            'limit' => 5
        );
        $this->Paginator->settings = $options;
        $events = $this->Paginator->paginate('Event');
//        $events = $this->Event->find('all',$paginate);
        
        $options = array(
            'joins' => array(
                array(
                    'table' => 'event_venues',
                    'alias' => 'EventVenue',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Event.id = EventVenue.event_id'
                    )
                ),
                array(
                    'table' => 'venues',
                    'alias' => 'Venue',
                    'type' => 'INNER',
                    'conditions' => array(
                        'EventVenue.venue_id = Venue.id'
                    )
                ),
                array(
                    'table' => 'tickets',
                    'alias' => 'Ticket',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Ticket.event_id = Event.id'
                    )
//                    'limit' => 1
                )
            ),
            'fields' => array(
                'DISTINCT Event.id',
                'Event.name',
                'Event.description',
                'Event.start_date',
                'Event.end_date',
                'Event.image',
//                'Venue.name',
//                'Venue.description',
//                'Ticket.price'
            ),
            'conditions' => array(
                'Event.status' => 1,
                'Event.featured' => 1,
                'Event.end_date >=' => date("Y-m-d H:i:s",strtotime('NOW'))
            ),
//            'order' => 'rand()',
            'order' => 'Event.start_date',
            'limit' => 3,
            'group' => 'Event.id'
        );
        
        $featured_events = $this->Event->find('all',$options);
//        debug($featured_events);
//        debug($events);
        //get featued events
        
        //debug($event);
        
        $options = array(
            'fields' => array(
                'Event.id',
                'Event.name',
                'Event.score',
                'Event.image'
            ),
            'conditions' => array(
                'Event.status' => 1,
                'Event.end_date <=' => date("Y-m-d H:i:s",strtotime('NOW'))
            ),
            'order' => 'rand()',
            'limit' => 4
        );
        
        $past_events = $this->Event->find('all',$options);

        foreach ($events as $k => $event) {
            $events[$k]['Event']['image'] = $this->Event->setEventImage($event['Event']['image']);
        }

        foreach ($featured_events as $k => $feat) {
            $featured_events[$k]['Event']['image'] = $this->Event->setEventImage($feat['Event']['image']);
        }

        foreach ($past_events as $k => $past) {
            $past_events[$k]['Event']['image'] = $this->Event->setEventImage($past['Event']['image']);
        }
        
        $this->set('events',$events);
        $this->set('featured_events',$featured_events);
        $this->set('past_events',$past_events);
        
        
    }
    
    public function view_event($id = NULL){
        $this->theme = 'Frontend';
        //this is for logged in user
        //first see if user may edit this
        //find_event array
        $event = $this->Event->findEventById($id);
//        debug($event);
        //make date format readable
        $start_date = strtotime($event['Event']['start_date']);
        $start_date_friendly = date('d F Y',$start_date);

        $end_date = strtotime($event['Event']['end_date']);
        $end_date_friendly = date('d F Y',$end_date);
        
        if($start_date == $end_date) {
            $event['Event']['date'] = $start_date_friendly;
        } else {
            $event['Event']['date'] = $start_date_friendly . ' to ' . $end_date_friendly;
        }

        //make times format readable
        $start_time = strtotime($event['Event']['start_time']);
        $start_time_friendly = date('h:i A',$start_time);

        $end_time = strtotime($event['Event']['end_time']);
        $end_time_friendly = date('h:i A',$end_time);
        
        $event['Event']['time'] = $start_time_friendly . ' to ' . $end_time_friendly;

        //get category name
        $this->Category = ClassRegistry::init('Category');
        $event['Event']['category'] = $this->Category->findCategoryNameById($event['Event']['category_id']);

        $event['Event']['image'] = $this->Event->setEventImage($event['Event']['image']);

        $this->set('event',$event);
        
        //find Tickets
        $this->Ticket = ClassRegistry::init('Ticket');
        $tickets = $this->Ticket->findTicketsForEvent($id);
        $this->set('tickets',$tickets);
        
        //Find organiser
        $this->Organiser = ClassRegistry::init('Organiser');
        $organiser = $this->Organiser->findEventOrganiser($id);
        $this->set('organiser',$organiser);
        
        //find URLS
        $this->EventUrl = ClassRegistry::init('EventUrl');
        $event_urls = $this->EventUrl->findUrlsByEvent($id);
        $this->set('event_urls',$event_urls);
        
        //find venue
        $this->Venue = ClassRegistry::init('Venue');
        $venue = $this->Venue->getVenueForEvent($id);
        $this->set('venue',$venue);
        
    }
    
    public function list_events(){
        $this->autoRender = false;
        $this->theme = 'Frontend';
    }
    
    public function search_events($keyword = NULL){
        $this->theme = 'Frontend';
        if(empty($keyword) || $keyword == NULL){
            return $this->redirect(array('action' => 'index'));
        }
        
        $options = array(
            'joins' => array(
                array(
                    'table' => 'event_venues',
                    'alias' => 'EventVenue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Event.id = EventVenue.event_id'
                    )
                ),
                array(
                    'table' => 'venues',
                    'alias' => 'Venue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Venue.id = EventVenue.venue_id'
                    )
                ),
                array(
                    'table' => 'tickets',
                    'alias' => 'Ticket',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Ticket.event_id = Event.id'
                    )
//                    'limit' => 1
                )
            ),
            'fields' => array(
                'Event.id',
                'Event.name',
                'Event.description',
                'Event.start_date',
                'Event.end_date',
                'Event.start_time',
                'Event.end_time',
                'Event.image',
                'Venue.name',
                'Venue.description',
                'Venue.longitude',
                'Venue.latitude',
                'Ticket.price'
            ),
            'conditions' => array(
                'Event.status' => 1,
                'Event.end_date >=' => date("Y-m-d H:i:s",strtotime('NOW')),
                'OR' => array(
                    'Event.name LIKE' => '%'.$keyword.'%',
                    'Event.description LIKE' => '%'.$keyword.'%'
                    
                )
            ),
            'order' => 'Event.start_date',
            'group' => 'Event.id',
            'limit' => 5
        );
        
        $this->Paginator->settings = $options;
        $events = $this->Paginator->paginate('Event');
        $this->set('events',$events);
        
        foreach ($events as $k => $event) {
            $events[$k]['Event']['image'] = $this->Event->setEventImage($event['Event']['image']);
        }

        
        
        $this->set('events',$events);
        
        
    }
    
    public function events_filter($what_selected,$where_selected,$when_selected){
        $this->theme = 'Frontend';
        
        $this->Session->write('what.selected',$what_selected);
        $this->Session->write('when.selected',$when_selected);
        $this->Session->write('where.selected',$where_selected);
        
        $this->set('what_selected', $this->Session->read('what.selected'));
        $this->set('when_selected', $this->Session->read('when.selected'));
        $this->set('where_selected',$this->Session->read('where.selected'));
        
        $options = array(
            'joins' => array(
                array(
                    'table' => 'event_venues',
                    'alias' => 'EventVenue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Event.id = EventVenue.event_id'
                    )
                ),
                array(
                    'table' => 'venues',
                    'alias' => 'Venue',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Venue.id = EventVenue.venue_id'
                    )
                ),
                array(
                    'table' => 'tickets',
                    'alias' => 'Ticket',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Ticket.event_id = Event.id'
                    )
//                    'limit' => 1
                )
            ),
            'fields' => array(
                'Event.id',
                'Event.name',
                'Event.description',
                'Event.start_date',
                'Event.end_date',
                'Event.start_time',
                'Event.end_time',
                'Event.image',
                'Venue.name',
                'Venue.description',
                'Venue.longitude',
                'Venue.latitude',
                'Ticket.price'
            ),
            'conditions' => array(
                'Event.status' => 1
            ),
            'order' => 'Event.start_date',
            'group' => 'Event.id',
            'limit' => 5
        );
        
        if($what_selected !== 'null'){
            $options['conditions']['Event.category_id'] = $what_selected;
        }
        
        if($where_selected !== 'null'){
            $options['conditions']['Venue.province_id'] = $where_selected;
        }
        
//        $whens[1] = 'Today';
//        $whens[2] = 'Tomorrow';
//        $whens[4] = 'This week';
//        $whens[8] = 'Next two weeks';
//        $whens[16] = 'This month';
//        $whens[32] = 'Next month';
        
        if($when_selected !== 'null'){
            switch ($when_selected){
                case 1:
                    //today date("Y-m-d H:i:s",strtotime('NOW'))
                    $options['conditions']['Event.start_date <='] = date("Y-m-d",strtotime('NOW'));
                    $options['conditions']['Event.end_date >='] = date("Y-m-d",strtotime('NOW'));
                    break;
                case 2:
                    $options['conditions']['Event.start_date <='] = date("Y-m-d",strtotime('+1 day'));
                    $options['conditions']['Event.end_date >='] = date("Y-m-d",strtotime('+1 day'));
                    //tomorrow
                    break;
                case 4:
                    $options['conditions']['OR']['Event.start_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+1 week')));
                    $options['conditions']['OR']['Event.end_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+1 week')));
                                        
                    //this week
                    break;
                case 8:
                    // next two weeks
                    $options['conditions']['OR']['Event.start_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+2 weeks')));
                    $options['conditions']['OR']['Event.end_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+2 weeks')));
                    break;
                case 16:
                    //this month
                    $options['conditions']['OR']['Event.start_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+1 month')));
                    $options['conditions']['OR']['Event.end_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+1 month')));
                    break;
                case 32:
                    $options['conditions']['OR']['Event.start_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+2 months')));
                    $options['conditions']['OR']['Event.end_date BETWEEN ? AND ?'] = array(date("Y-m-d",strtotime('-1 day')),date("Y-m-d",strtotime('+2 months')));
                    //next month
                    break;
                default :
                    $options['conditions']['Event.end_date <'] = date("Y-m-d",strtotime('NOW'));
                break;
            }
        } else {
            $options['conditions']['Event.start_date >='] = date("Y-m-d",strtotime('NOW'));
        }
        
        
        
            
            $this->Paginator->settings = $options;
            $events = $this->Paginator->paginate('Event');
            
            $this->set('events',$events);
            foreach ($events as $k => $event) {
                $events[$k]['Event']['image'] = $this->Event->setEventImage($event['Event']['image']);
            }

            

            $this->set('events',$events);
            
            
    }
    
    public function view($id = NULL){
        $this->theme = 'Frontend';
        
        //this is for logged in user
        //first see if user may edit this
        //find_event array
        $event = $this->Event->findEventById($id);

        //make date format readable
        $start_date = strtotime($event['Event']['start_date']);
        $start_date_friendly = date('d F Y',$start_date);

        $end_date = strtotime($event['Event']['end_date']);
        $end_date_friendly = date('d F Y',$end_date);
        
        if($start_date == $end_date) {
            $event['Event']['date'] = $start_date_friendly;
        } else {
            $event['Event']['date'] = $start_date_friendly . ' to ' . $end_date_friendly;
        }

        //make times format readable
        $start_time = strtotime($event['Event']['start_time']);
        $start_time_friendly = date('h:i A',$start_time);

        $end_time = strtotime($event['Event']['end_time']);
        $end_time_friendly = date('h:i A',$end_time);
        
        $event['Event']['time'] = $start_time_friendly . ' to ' . $end_time_friendly;

        //get category name
        $this->Category = ClassRegistry::init('Category');
        $event['Event']['category'] = $this->Category->findCategoryNameById($event['Event']['category_id']);

        $event['Event']['image'] = $this->Event->setEventImage($event['Event']['image']);

        $this->set('event',$event);
        
        //find Tickets
        $this->Ticket = ClassRegistry::init('Ticket');
        $tickets = $this->Ticket->findTicketsForEvent($id);
        $this->set('tickets',$tickets);
        
        //Find organiser
        $this->Organiser = ClassRegistry::init('Organiser');
        $organiser = $this->Organiser->findEventOrganiser($id);
        $this->set('organiser',$organiser);
        
        //find URLS
        $this->EventUrl = ClassRegistry::init('EventUrl');
        $event_urls = $this->EventUrl->findUrlsByEvent($id);
        $this->set('event_urls',$event_urls);
        
        //find venue
        $this->Venue = ClassRegistry::init('Venue');
        $venue = $this->Venue->getVenueForEvent($id);
        $this->set('venue',$venue);
        
        $meta_description = $event['Event']['description'];
        $this->set('meta_description',$meta_description);
        
    }
    
    public function save_rating($id,$score){
        $this->layout = 'ajax';
        
        $options = array(
            'fields' => array(
                'Event.score'
            ),
            'conditions' => array(
                'Event.id' => $id
            ),
            'recursive' => -1
        );
        
        $current_score = $this->Event->find('first',$options);
        
        $add_score = $current_score['Event']['score'] + $score;
        $new_score = $add_score / 2;
        
        $save_data = array();
        $save_data['Event']['id'] = $id;
        $save_data['Event']['score'] = $new_score;
        
        $this->log($this->Event->save($save_data,$validate = FALSE),'ratings');;
        
        return $new_score;
        
    }
    
    public function my_events(){
        if($this->Auth->user('status') == 2){
            //redirect
            return $this->redirect(array('action' => 'my_events_admin'));
        }
        //for logged in users
        $user = $this->Auth->user('id');
        
        $options = array(
            'conditions' => array(
                'Event.provider_id' => $user
            ),
            'recursive' => -1,
            'limit' => 15
        );
        
        $this->Paginator->settings = $options;
        $events = $this->Paginator->paginate('Event');
        
        $this->set('events',$events);
    }
    
    public function edit_event_image($event_id){
        $this->set('event_id',$event_id);
        if($this->request->is('Post') || $this->request->is('Put')){
            
            $data = $this->request->data;
//            debug($data);
//            return;
            $dimensions = getimagesize($data['Event']['logo']['tmp_name']);
            $extension = pathinfo($data['Event']['logo']['tmp_name'], PATHINFO_EXTENSION);
//            if($extension !== 'png' || $extension !== 'jpg' || $extension !== 'PNG' || $extension !== 'jpeg' || $extension !== 'JPEG'){
//                $this->Event->validationErrors['logo'] = 'You have not uploaded a valid image.';
//                return;
//                break;
//            }
            
            if ($dimensions[0] !== $dimensions[1]) {
                
                $this->Event->validationErrors['logo'] = 'Image must be square.';
                return;
                break;
                
                
            }
            
            if($dimensions[0] < 400){
                    $this->Event->validationErrors['logo'] = 'Image must be atleast 400x400px.';
                    return;
                    break;
            }
            //LEAVE THIS UUID AS IT IS USED FOR THE IMAGE UPLOAD FILE NAME
            //IT MUST BE THE SAME AS THE SUBSCRIPTION ID
//            $uuid = String::uuid();
            $data['Event']['id'] = $event_id;

            $imageArray = $data['Event']['logo'];
            $path = "img/events/";

            $image_name = $this->Event->createImages($event_id,$imageArray,$path,$sizes_array = NULL);

            $data['Event']['image'] = $image_name;
            
            //savedatatodb
            if($this->Event->save($data, $validate = false)){
                return $this->redirect(array('action' => 'view_event', $event_id));
            }
            
        }
        
    }
    
    public function my_events_admin(){
        //for logged in users
        $user = $this->Auth->user('id');
        
        if($this->Auth->user('status') == 1 || $this->Auth->user('status') == 0){
            //redirect
            return $this->redirect(array('action' => 'my_events'));
        }
        
        $options = array(
            'order' => array(
                //'Event.start_date' => 'asc',
                'Event.start_date' => 'desc',
                'Event.name'
            ),
            'limit' => 15
        );
        
        $this->Paginator->settings = $options;
        $events = $this->Paginator->paginate('Event');
        
        $this->set('events',$events);
    }
    
    public function approve_event($event_id){
//        $this->layout = 'ajax';
        $options = array(
            'fields' => array(
                'Event.status'
            ),
            'conditions' => array(
                'Event.id' => $event_id
            ),
            'recursive' => -1
        );
        
        $event_status = $this->Event->find('first',$options);
        
        if(empty($event_status)){
            //redirect
            $this->log('cannotfind','event_stuff');
            return $this->redirect(array('action' => 'my_events_admin'));
            
        }
        
        $data = array();
        $data['Event']['id'] = $event_id;
        $data['Event']['status'] = 1;
        
        if($this->Event->save($data,$validate = FALSE)){
            return $this->redirect(array('action' => 'my_events_admin'));
        }
        
        
    }
}

?>

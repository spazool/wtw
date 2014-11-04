<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('display');
        }
   

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	public $theme = 'Frontend';
        

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	
	

	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
        
        

	public function about_us() {
    }
        
    public function contact_us() {
        debug($this->request->data);
//       if($this->request->is('Post')){
//            //do what you need to do, validate the data and shit
//            $data = $this->request->data;
//            $this->Landing->set($data);
//            $validate = array('fieldList' => array('fullname','email','mobile','message'));
//            if($this->Landing->validates($validate)){
//                
////                $html = 'Full Name: '.$data['Landing']['fullname'].'</br> '
//                //send email
//                App::uses('CakeEmail', 'Network/Email');
//                $Email = new CakeEmail('smtp');
//                $Email->from(array('info@wheresthewine.co.za' => 'Wheres the wine site'));
//                $Email->to('sales@wheresthewine.co.za');
//                $Email->emailFormat('html');
//                $Email->subject('Website');
//                $Email->send($data['Landing']['fullname'].'<br/>'.
//                                $data['Landing']['subject'].'<br/>'.
//                                $data['Landing']['email'].'<br/>'.
//                                $data['Landing']['mobile'].'<br/>'.
//                                $data['Landing']['message'].'<br/>');
//                //redirect to home
//                return $this->redirect(array('action' => 'landing'));
//            }
//            
//        }
        
        
        //set array here
    }
    
    public function advertising() {
        
    }
        
        
}

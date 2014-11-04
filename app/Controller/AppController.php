<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $helpers = array('Html', 'Form', 'Session', 'Js' => array('Jquery'));    
    
    public $components = array(
        'DebugKit.Toolbar',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        ),
        'Session',
        'Paginator'
    );
    
    public function beforeFilter() {
//        parent::beforeFilter();
        $this->Paginator->settings = array('limit' => 3);
        
    }

        //check core
    public function beforeRender() {
        
        $this->theme = 'Frontend';
        $current_user = $this->Auth->user();
        
        $this->set('ad_contact',0);
        $this->set('ad_approve',0);
        
        $refere = $this->referer();
        $this->disableCache();
        $this->set(compact('current_user','refere'));
        
        //get categories
        // get provinces
        $this->Category = ClassRegistry::init('Category');
        $categories = $this->Category->getCategoryList();
        
        $this->Province = ClassRegistry::init('Province');
        $provinces = $this->Province->getProvinceList();
        
        $this->set('what_selected', $this->Session->read('what.selected'));
        $this->set('when_selected', $this->Session->read('when.selected'));
        $this->set('where_selected',$this->Session->read('where.selected'));
        
        $whens = array();
        $whens[1] = 'Today';
        $whens[2] = 'Tomorrow';
        $whens[4] = 'This week';
        $whens[8] = 'Next two weeks';
        $whens[16] = 'This month';
        $whens[32] = 'Next month';
        
        $this->set(compact('categories','provinces','whens'));
        
        //get adverts
        $this->Advert = ClassRegistry::init('Advert');
        $ads = $this->Advert->getRandomAds();
        
        foreach ($ads as $ad){
            $this->Advert->addImpression($ad['Advert']['id']);
        }
//        debug($ads);
        $this->set('ads',$ads);

    }
}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('SimplePasswordHasher','Controller/Component/Auth');
//App::users('BlowfishPasswordHasher','Controller/Component/Auth');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components=array(
	//	'Debugkit.Toolbar',
	//	'RequestHandler',
		'Session',
		'Flash',
		'Auth'=>array(
			'loginAction'=>array('controller'=>'users','action'=>'login'),
			'loginRedirect'=>array('controller'=>'users','action'=>'index'),
			'logoutRedirect'=>array('controller'=>'users','action'=>'logout'),
			'authError'=>'You do not have the authority to view this page',
			'loginError'=>'Invalid Username or Password entered, please try again.',
			'authorize'=>array('Controller'), 
			'authenticate'=>array(
				'Form'=>array(
					'passwordHasher'=>'Simple'
				)
			)
		)
	);

	public function isAuthorized($user){
			return true;
		}

	public function beforeFilter(){

	//	parent::beforeFilter();
	//	Security::setHash('sha256');
		$this->Auth->allow("login","logout");
	//	$this->set('logged_in',$this->Auth->loggedIn());
	//	$this->set('current_user',$this->Auth->user());
		if($this->Auth->user('role')=='administrator'){
			$this->Auth->loginRedirect = array('controller'=>'administrators','action'=>'index');
		}
		elseif($this->Auth->user('role')=='professor'){
		
			$this->Auth->loginRedirect=array('controller'=>'professors','action'=>'index');
		}
		else{
			$this->Auth->loginRedirect=array('controller'=>'students','action'=>'index');
		}  
	}
}

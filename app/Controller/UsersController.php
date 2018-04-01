<?php
App :: uses ('AppController','Controller');
App:: uses('SimplePasswordHasher','Controller/Component/Auth');
//App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
class UsersController extends AppController{
	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('login','logout','add');
		if($this->Auth->user('role')=='administrator'){
			$this->Auth->loginRedirect = array(
				'controller'=>'administrators',
				'action'=>'index'
			);
		}	
		elseif($this->Auth->user('role') == 'professor'){
			$this->Auth->loginRedirect = array(
				'controller'=>'professors',
				'action' =>'index'
			);
		}
		elseif($this->Auth->user('role') == 'student'){
			$this->Auth->loginRedirect = array(
				'controller'=>'students',
				'action'=>'index'
			);	
		}	
	}	


	public function index(){
		$this->User->recursive=0;
		$this->set('users',$this->paginate());	
	}

	public function login(){
		$this->loadModel('User');
		if($this->request->is('post')){
			//$passwordHasher2 = new SimplePasswordHasher();
			//$this->request->data['User']['password']=$passwordHasher2->hash($this->data['User']['password']);
			if($this->Auth->login()){
				$this->Session->setFlash(__('Welcome,'.$this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			}
			else{
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	public function add(){
		if($this->request->is('post')){
			$this->User->create();
			if($this->User->save($this->request->data)){	
				$this->Flash->success(__('The user has been saved'));
				$this->redirect(array('controller'=>'users','action'=>'login'));
			}
			$this->Flash->error(
				__('The user could not be saved. Please, try again.')
			);
		}
	}
}
?>

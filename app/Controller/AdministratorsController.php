<?php
class AdministratorsController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){
		
	}
	public function proInfo(){
		$this->loadModel('User');
		$this->set('professors', $this->User->findAllByRole('professor'));
	}
	public function stuInfo(){
		$this->loadModel('User');
		$this->set('students',$this->User->findAllByRole('student'));
	}
	public function viewPro($id=null){
		$this->loadModel('User');
		$professor=$this->User->findByIdAndRole($id,'professor');
		$this->set('professors',$professor);
	}
	public function viewStu($id=null){
		$this->loadModel('User');
		$student=$this->User->findByIdAndRole($id,'student');
		$this->set('students',$student);
	}
	public function deletePro($id){
		$this->loadModel('User');
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->User->delete($id)){
			$this->Flash->success(
				__('This user with id: %s has been deleted.',h($id) )
			);
		}
		else{
			$this->Flash->error(
				__('This user with id: %s could not be deleted.',h($id))
			);
		}
	return $this->redirect(array('action'=>'proInfo'));
	}
	public function deletStu($id){
		$this->loadModel('User');
		if($this->request->is('get')){
			throw new MethodNotAllowedExpection();
		}
		if($this->User->delete($id)){
			$this->Flash->success(
				__('This user with id: %s has been deleted.',h($id))
			);
		}
	return $this->redirect(array('action'=>'stuInfo'));
	}
	public function addPro(){
		$this->loadModel('User');
		if($this->request->is('post')){
			$this->User->create();
			$this->request->data['User']['role']='professor';
		if($this->User->save($this->request->data)){
			$this->Flash->success(__('You have added a user.'));
			return $this->redirect(array( 'controller'=>'administrators','action'=>'proInfo'));
		}
		$this->Flash->error(__('Unable to add this user.'));
		}
	}
	public function addStu(){
		$this->loadModel('User');
		if($this->request->is('post')){
			$this->User->create();
		if($this->User->save($this->request->data)){
			$this->User->role = 'student';
			$this->Flash->success(__('You have added a user.'));
			return $this->redirect(array('action'=>'stuInfo'));
		}
		$this->Flash->error(__('Unable to add this user.'));
		}
	}
	public function updatePro($id=null){
		$this->loadModel('User');
		if(!$id){
			throw new NotFoundException(__('Invalid professor user'));
		}
		$professor = $this->User->findById($id);
		if(!$professor){
			throw new NotFoundException(__('Invalid professor user'));
		}
		if($this->request->is(array('professor','put'))){
			$this->User->id = $id;
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('Your user information has been updated'));
				return $this->redirect(array('action'=>'proInfo'));
			}
		$this->Flash->error(__('Unable to update this user.'));
		}
		if(!$this->request->data){
			$this->request->data = $professor;
		}
	}
	public function updateStu($id = null){
		$this->loadModel('User');
		if(!$id){
			throw new NotFoundException(__('Invalid student user1'));
		}
		
		$student=$this->User->findById($id);
		if(!$student){
			throw new NotFoundException(__('Invalid student user2'));
		}
		if($this->request->is(array('student','put'))){
			$this->User->id = $id;
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('This student has been updated.'));
			return $this->redirect(array('action'=>'stuInfo'));
			}
		$this->Flash->error(__('Unable to update this user.'));
		}
		if(!$this->request->data){
			$this->request->data=$student;
		}
	}


}

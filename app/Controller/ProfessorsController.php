<?php
class ProfessorsController extends AppController{
	public $helpers = array('Html','Form');
	//select the courses list according to professor id in course table
	public function index(){
		$this->loadModel('Course');
		$professor_id=$this->Auth->user('id');
		$course=$this->Course->findAllByProfessorId($professor_id);
		$this->set('course',$course);	
	}
	public function courseInfo($id){
		$this->loadModel('Course');
		$this->set('course', $this->Course->findById($id));
		
	}
	public function gradeInfo($course_id=null){
		$this->loadModel('Grade');
		$grades=$this->Grade->find('all',array('conditions'=>array('course_id ='=>$course_id)));
		$this->set('grades',$grades);
	}
	public function viewCourse($id=null){
		$this->loadModel('Course');
		$course=$this->Course->findById($id);
		$this->set('courses',$course);
	}
	public function viewGrade($id=null){
		$this->loadModel('Grade');
		$grade=$this->Grade->findById($id);
		$this->set('grades',$grade);
	}
	public function deleteCourse($id){
		$this->loadModel('Course');
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Course->delete($id)){
			$this->Flash->success(
				__('This course with id: %s has been deleted.',h($id) )
			);
		}
		else{
			$this->Flash->error(
				__('This course with id: %s could not be deleted.',h($id))
			);
		}
	return $this->redirect(array('action'=>'index'));
	}
	public function addCourse(){
		$this->loadModel('Course');
		if($this->request->is('post')){
			$this->request->data['Course']['professor_id']=$this->Auth->user('id');
			$this->Course->create();
		if($this->Course->save($this->request->data)){
			$this->Flash->success(__('You have added a course.'));
			return $this->redirect(array( 'controller'=>'professors','action'=>'index'));
		}
		$this->Flash->error(__('Unable to add this course.'));
		}
	}
	public function updateCourse($id=null){
		$this->loadModel('Course');
		if(!$id){
			throw new NotFoundException(__('Invalid course'));
		}
		$course = $this->Course->findById($id);
		if(!$course){
			throw new NotFoundException(__('Invalid course'));
		}
		if($this->request->is(array('course','put'))){
			$this->Course->id = $id;
			$this->Course->professor_id=$this->Auth->user('id');
			if($this->Course->save($this->request->data)){
				$this->Flash->success(__('Your user information has been updated'));
				return $this->redirect(array('action'=>'index'));
			}
		$this->Flash->error(__('Unable to update this course.'));
		}
		if(!$this->request->data){
			$this->request->data = $course;
		}
	}
	public function updateGrade($id=null){
		$this->loadModel('Grade');
		if(!$id){
			throw new NotFoundException(__('Invalid grade information'));
		}
		$grade=$this->Grade->findById($id);
		if(!$grade){
			throw new NotFoundException(__('Invalid grade information'));
		}

		if($this->request->is(array('post','put'))){
			$this->Grade->id=$id;
			if($this->Grade->save($this->request->data)){
				$this->Flash->success(__('This grade has been updated.'));
				return $this->redirect(array('action'=>'gradeInfo',$grade['Grade']['course_id']));
			}
			$this->Flash->error(__('Unable to update.'));
		}
		if(!$this->request->data){
			$this->request->data=$grade;
			}
		}
}

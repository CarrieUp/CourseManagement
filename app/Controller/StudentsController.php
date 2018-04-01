<?php
class StudentsController extends AppController{
	public function index(){
		$this->loadModel('Grade');
		$id=$this->Auth->user('id');
		$student_id=$id;
		$grade=$this->Grade->findAllByStudentId($student_id);
		$this->set('grades',$grade);
	}
}

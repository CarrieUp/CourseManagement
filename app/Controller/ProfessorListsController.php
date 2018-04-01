<?php
class ProfessorListsController extends AppController{
	public function proInfo(){
		$this->set('professors', $this->Professor->find('all'));
	}
	public function delete($proId){

	}
	public function update($proId){

	}
	public function insert(){

	}
}

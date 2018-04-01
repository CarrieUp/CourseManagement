<?php
App :: uses('AppModel','Model');
App::uses('SimplePasswordHasher','Controller/Component/Auth');
class User extends AppModel{
	public $validate = array(
		'username'=>array(
			'required'=> array(
				'rule'=>array('notBlank'),
				'message'=>'A username is required'
			)
		),
		'password'=>array(
				'required'=>array(
					'rule'=>array('notBlank'),
					'message'=>'A pasword is required'
				)
			),

		'role' => array(
				'valid'=>array(
					'rule'=>array('inList',array('administrator','student','professor')),
					'message'=>'Please enter a valid role',
					'allowEmpty'=>false
				)
			)

	);
	public function beforeSave($options = array()){
		if(!$this->id){
			//$passwordHasher = new BlowfishPasswordHasher();
			$passwordHasher = new SimplePasswordHasher();
	$this->data['User']['password'] =$passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}

}
?>

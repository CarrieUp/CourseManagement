<?php
	class Professor extends AppModel{
		public $validate = array(
			'name' => array(
				'required'=>array(
					'rule'=> 'notBlank',					'message'=> 'Please input professor name'
				)
			),
			'password' => array(
				'required'=>array(
					'rule'=>'notBlank',
					'message'=> 'Please input a password'
				)
			)
		);
	}
?>

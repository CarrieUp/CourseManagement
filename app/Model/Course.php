<?php
class Course extends AppModel{
	public $validate = array(
		'professor_id'=>array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'please input a professor id'
			)
		),
		'name' =>array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'please input a name'
			)
		),
		'time_period'=> array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'please input the time period'
			)
		),
		'place' => array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=> 'please input the weekly date'
			)
		),
		'classroom' => array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'please input the place'
			)
		)
	);
	public $hasMany = array(
		'Grade'=> array(
			'className'=>'Grade',
			'foreignKey'=>'course_id',
		//	'conditions'=>array('Grade.course_id'=>'Course.id'),
			'dependent'=>true
		)
	);
} 
?>

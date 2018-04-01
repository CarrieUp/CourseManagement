<?php
class Grade extends AppModel{
	public $belongsTo = 'Course';
	public $validate = array(
		'course_id' =>array(
			'required'=>array(
				'rule'=>array('notBlank')
				)
		),
		'student_id'=> array(
			'required'=>array(
				'rule'=>array('notBlank')
			)
		),
		'grade' => array(
			'required'=>array(
				'rule'=>array('notBlank')
			)
		)
	);
} 
?>

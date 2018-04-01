Class Administrator extends AppModel{
	public $validate = array(
		'name'=>array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'Please input administrator name'
			)
		),
		'password'=>array(
			'required'=>array(
				'rule'=>array('notBlank'),
				'message'=>'Please input password'
			)
		)
	
	)
}

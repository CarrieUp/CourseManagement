<h1>Course management system</h1>
<?php 
	echo $this->Html->link(
	'Professor Information',array('controller'=>'administrators','action'=>'proInfo')
	);
 ?>
<?php	echo $this->Html->link(
	'Student Information', array('controller'=>'administrators','action'=>'stuInfo')
	) ;
?>

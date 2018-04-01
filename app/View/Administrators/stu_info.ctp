<h1>Course management system</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Password</th>
	</tr>

<!--list all the students users-->
	<?php foreach($students as $student): ?>
	<tr>
		<td> <?php echo $this->Html->link( $student['User']['id'],array('controller'=>'administrators','action'=>'viewStu',$student['User']['id'])); ?> </td>
		<td><?php echo $student['User']['username'];?> </td>
		<td><?php echo $student['User']['password'];?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($student);?>

</table>
<p><?php echo $this->Html->link('Add student', array('action'=>'addStu'));?></p>

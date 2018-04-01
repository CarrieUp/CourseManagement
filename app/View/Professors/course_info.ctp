<h1>Course List</h1>
<table>
	<tr>
		<th>Course id</th>
		<th>Course name</th>
		<th>Time period</th>
		<th>Weekday</th>
		<th>Classroom</th>
		<th>Delete</th>
		<th>Update</th>
		<th>Add</th>
	</tr>

	<!--put all the course information of this professor-->
<?php foreach($course as $course):?>
<tr>
	<td><?php echo $course['Course']['id']; ?></td>
	<td><?php echo $this->Html->link($course['Course']['name'],array('controller'=> 'professors','action'=>'gradeInfo',$course['Course']['id'])) ;?></td>
	<td><?php echo $course['Course']['time_period']; ?> </td>
	<td><?php echo $course['Course']['weekly'];?></td>
	<td><?php echo $course['Course']['place']; ?>
	<td><?php echo $this->Form->postLink('Delete',array('action'=>'deleteCourse',$course['Course']['id']),array('confirm'=>'Are you sure?')); ?>
	<td><?php echo $this->Html->link('Update',array('action'=>'updateCourse',$course['Course']['id'])); ?> </td>
	<th><?php echo $this->Html->link('Add',array('controller'=>'professors','action'=>'addCourse')); ?>
</tr>
<?php endforeach; ?>
<? unset($course); ?>
</table>


<h1>Grade information </h1>
<table>
	<tr>
		<th>Student id</th>
		<th>Grade</th>
		<th>Upgrade</th>
	</tr>

	<?php foreach ($grades as $grade): ?>  
	<tr>
		<td><?php echo $grade['Grade']['student_id']; ?> </td>
		<td><?php echo $grade['Grade']['grade']; ?>
		<td><?php echo $this->Html->link('Update',array('action'=>'updateGrade', $grade['Grade']['id'])); ?></td>
	</tr>
	<?php endforeach; ?>   
<!--	<?php unset($grade); ?> -->
</table>

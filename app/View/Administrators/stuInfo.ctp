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
		<td> <?php echo $student['User']['id']; ?> </td>
		<td><?php echo $student['User']['name'];?> </td>
		<td><?php echo $student['User']['password'];?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($student);?>

</table>

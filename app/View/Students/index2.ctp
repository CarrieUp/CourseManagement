<h1>Grade information </h1>
<table>
	<tr>
		<th>Course name</th>
		<th>Grade</th>
	</tr>

	<?php foreach ($grade as $grade): ?>  
	<tr>
		<td><?php echo $grade['Grade']['name']; ?> </td>
		<td><?php echo $grade['Grade']['grade']; ?>
	</tr>
	<?php endforeach; ?>   
<!--	<?php unset($grade); ?> -->
</table>

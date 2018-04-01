<h1>Grade information </h1>
<table>
	<tr>
		<th>Course name</th>
		<th>Grade</th>
	</tr>
	<?php foreach($grades as $grade): ?>
	<tr>
		<td><?php echo $grade['Course']['name']; ?></td>
		<td><?php echo $grade['Grade']['grade'] ;?> </td>
	</tr>
	<?php endforeach  ;?>
	<?php unset($grade) ;?>
</table>

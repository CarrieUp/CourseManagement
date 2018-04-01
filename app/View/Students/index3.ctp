<h1>Grade information </h1>
<table>
	<tr>
		<th>Course name</th>
		<th>Grade</th>
	</tr>
<?php	if(count($grades) ==1) : ;?>
	<?php debug($grades) ;?>
	<tr>
		<td><?php echo $grades['Course']['name']; ?> </td>
		<td><?php echo $grades['Grade']['grade']; ?>
	</tr>
<?php   else : ;?>
	<?php foreach($grades as $grade): ?>
	<tr>
		<td><?php echo $grade['Course']['name']; ?></td>
		<td><?php echo $grade['Grade']['grade'] ;?> </td>
	</tr>
	<?php endforeach  ;?>

<?php endif ?>
</table>

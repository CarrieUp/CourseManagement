<h1>Professor Information List</h1>
<table>
	<tr>
		<!-- <th>Selected</th> -->
		<th>Id</th>
		<th>Name</th>
		<th>Password</th>
	</tr>
	<tr>
	<?php foreach($professors as $porfessor); ?>
	<td><?php echo $professor['Professor']['id'] ?></td>
	<td><?php echo $professor['Professor']['name'] ?></td>
	<td><?php echo $professor[''Professor]['password']?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($professors); ?>
</table>

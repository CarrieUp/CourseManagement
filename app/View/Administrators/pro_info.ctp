<h1>Course management system</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Password</th>
	</tr>

<!--list all the professor users-->
	<?php foreach($professors as $professor): ?>
	<tr>
		<td> <?php echo $this->Html->link($professor['User']['id'],array('controller' => 'administrators','action'=> 'viewPro',$professor['User']['id'])); ?> </td>
		<td><?php echo $professor['User']['username'];?> </td>
		<td><?php echo $professor['User']['password'];?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($professor);?>

</table>
<p><?php echo $this->Html->link("Add new professor",array('action'=>'addPro'));?></p>

<h1>Course Management System</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Password</th>
	</tr>
	<tr>
		<td><?php echo $professors['User']['id']; ?> </td>
		<td><?php echo $professors['User']['username'];?></td>
		<td><?php echo $professors['User']['password']; ?></td>
	</tr>
</table>
</br>
</br>
<dl>
<dd><?php echo $this->Form->postLink('delete',array('controller'=>'administrators','action'=>'deletePro',$professors['User']['id']),array('confirm'=>'Are you sure to delete this user?') ); ?></dd>
</br>
</br>
<dd> <?php echo $this->Html->link('update',array('controller'=>'administrators', 'action'=> 'updatePro',$professors['User']['id'])) ?> </dd>
</dl>
<?php unset($professors); ?>

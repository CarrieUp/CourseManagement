<h1>Update grade information </h1>
<?php
echo $this->Form->create('Grade');
echo $this->Form->input('student_id',array('type'=>'hidden'));
echo $this->Form->input('course_id',array('type'=>'hidden'));
echo $this->Form->input('grade');
echo $this->Form->end('Save grade');
?>

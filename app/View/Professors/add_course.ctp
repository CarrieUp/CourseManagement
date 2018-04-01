<h1>Course Management System</h1>
<?php
echo $this->Form->create('Course');
echo $this->Form->input('name');
echo $this->Form->input('time_period');
echo $this->Form->input('weekly');
echo $this->Form->input('place');
echo $this->Form->end('Save Course!');
?>





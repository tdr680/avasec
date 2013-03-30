<!-- File: /app/View/Teams/add.ctp -->

<h1>Add Team</h1>
<?php
echo $this->Form->create('Team');
echo $this->Form->input('name');
/*echo $this->Form->input('Member');*/
echo $this->Form->end('Save Team');
?>

<!-- File: /app/View/Users/add.ctp -->

<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('login');
echo $this->Form->input('name');
echo $this->Form->end('Save User');
?>


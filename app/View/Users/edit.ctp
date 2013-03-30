<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit User</h1>
<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($user);

echo $this->Form->create('User');
echo $user['User']['id']    .'</br>';
echo $user['User']['login'] .'</br>';
echo $user['User']['name']  .'</br>';
echo $this->Form->input('name');

//echo $this->Form->checkbox('jinej_input');

$selected = array();
foreach ($user['Team'] as $tid) {
  $selected[] = $tid['id'];
}
echo $this->Form->input('Team', array('type'      => 'select', 
                                      'multiple'  => 'checkbox',
                                      'selected'  => $selected
));
echo $this->Form->end('Save User');
?>


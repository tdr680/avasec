<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit User</h1>
<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($user);

echo $this->Form->create('User');
echo $user['User']['id']    .'</br>';
echo $user['User']['login'] .'</br>';
echo $user['User']['name']  .'</br>';
echo $this->Form->input('name', array('default' => $user['User']['name']));

//echo $this->Form->checkbox('jinej_input');

$selected_team = array();
foreach ($user['Team'] as $tid) {
  $selected_team[] = $tid['id'];
}
echo $this->Form->input('Team', array('type'      => 'select', 
                                      'multiple'  => 'checkbox',
                                      'selected'  => $selected_team
));

$selected_role = array();
foreach ($user['Role'] as $rid) {
  $selected_role[] = $rid['id'];
}
echo $this->Form->input('Role', array('type'      => 'select', 
                                      'multiple'  => 'checkbox',
                                      'selected'  => $selected_role
));

echo $this->Form->end('Save User');
?>


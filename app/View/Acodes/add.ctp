<div class="acodes form">
<?php echo $this->Form->create('Acode'); ?>
	<fieldset>
		<legend><?php echo __('Add Acode'); ?></legend>
	<?php
		echo $this->Form->input('extid');
		echo $this->Form->input('charid');
		echo $this->Form->input('name');
		echo $this->Form->input('Entity');
		echo $this->Form->input('Role');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Acodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

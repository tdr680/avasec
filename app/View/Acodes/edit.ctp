<div class="acodes form">
<?php echo $this->Form->create('Acode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Acode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Entity');
		echo $this->Form->input('Role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Acode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Acode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>

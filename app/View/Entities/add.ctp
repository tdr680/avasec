<div class="entities form">
<?php echo $this->Form->create('Entity'); ?>
	<fieldset>
		<legend><?php echo __('Add Entity'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('extid');
		echo $this->Form->input('charid');
		echo $this->Form->input('name');
		echo $this->Form->input('Acode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('controller' => 'acodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li>
	</ul>
</div>

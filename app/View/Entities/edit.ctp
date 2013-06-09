<div class="entities form">
<?php echo $this->Form->create('Entity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entity'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Entity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Entity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('controller' => 'acodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li>
	</ul>
</div>

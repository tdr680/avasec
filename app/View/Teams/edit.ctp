<div class="teams form">
  <?php echo $this->Form->create('Team'); ?>
  <fieldset>
	<legend><?php echo __('Edit Team'); ?></legend>
	<?php
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	//echo $this->Form->input('User');
	?>
  </fieldset>
  <?php echo $this->Form->end(__('Submit')); ?>
</div>

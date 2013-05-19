<?php $entity_type = $this->fetch('type') ?>

<h2>
  <?php  echo __($entity_type); ?>
</h2>

<dl>
  <dt><?php echo __('Id'); ?></dt>
  <dd>
	<?php echo h($entity[$entity_type]['id']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Name'); ?></dt>
  <dd>
	<?php echo h($entity[$entity_type]['name']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('CharId'); ?></dt>
  <dd>
	<?php echo h($entity[$entity_type]['charid']); ?>
	&nbsp;
  </dd>
</dl>

<?php /*echo $this->fetch('acode');*/ ?>

<?php echo $this->fetch('content'); ?>

<!-- here goes other entity generic stuss (acodes, etc.) -->


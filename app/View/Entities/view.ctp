<?php $entity_type = $this->fetch('type') ?>

<div class="entities view">
<h2><?php  echo __($entity_type); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entity[$entity_type]['id']); ?>
			&nbsp;
		</dd>
		<!-- <dt><?php echo __('Type'); ?></dt> -->
		<!-- <dd> -->
		<!-- 	<?php echo h($entity[$entity_type]['type']); ?> -->
		<!-- 	&nbsp; -->
		<!-- </dd> -->
		<dt><?php echo __('Extid'); ?></dt>
		<dd>
			<?php echo h($entity[$entity_type]['extid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charid'); ?></dt>
		<dd>
			<?php echo h($entity[$entity_type]['charid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($entity[$entity_type]['name']); ?>
			&nbsp;
		</dd>
	</dl>

    <?php /*echo $this->fetch('acode');*/ ?>
    <?php echo $this->fetch('content'); ?>
    <!-- here goes other entity generic stuss (acodes, etc.) -->

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entity'), array('action' => 'edit', $entity[$entity_type]['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entity'), array('action' => 'delete', $entity[$entity_type]['id']), null, __('Are you sure you want to delete # %s?', $entity[$entity_type]['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('controller' => 'acodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Acodes'); ?></h3>
	<?php if (!empty($entity['Acode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Extid'); ?></th>
		<th><?php echo __('Charid'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entity['Acode'] as $acode): ?>
		<tr>
			<td><?php echo $acode['id']; ?></td>
			<td><?php echo $acode['extid']; ?></td>
			<td><?php echo $acode['charid']; ?></td>
			<td><?php echo $acode['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'acodes', 'action' => 'view', $acode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'acodes', 'action' => 'edit', $acode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'acodes', 'action' => 'delete', $acode['id']), null, __('Are you sure you want to delete # %s?', $acode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="entities view">
<h2><?php  echo __('Entity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entity['Entity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($entity['Entity']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entity'), array('action' => 'edit', $entity['Entity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entity'), array('action' => 'delete', $entity['Entity']['id']), null, __('Are you sure you want to delete # %s?', $entity['Entity']['id'])); ?> </li>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entity['Acode'] as $acode): ?>
		<tr>
			<td><?php echo $acode['id']; ?></td>
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

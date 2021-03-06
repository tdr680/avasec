<div class="acodes view">
<h2><?php  echo __('Acode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acode['Acode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extid'); ?></dt>
		<dd>
			<?php echo h($acode['Acode']['extid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charid'); ?></dt>
		<dd>
			<?php echo h($acode['Acode']['charid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($acode['Acode']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acode'), array('action' => 'edit', $acode['Acode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acode'), array('action' => 'delete', $acode['Acode']['id']), null, __('Are you sure you want to delete # %s?', $acode['Acode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entities'); ?></h3>
	<?php if (!empty($acode['Entity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Extid'); ?></th>
		<th><?php echo __('Charid'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($acode['Entity'] as $entity): ?>
		<tr>
			<td><?php echo $entity['id']; ?></td>
			<td><?php echo $entity['type']; ?></td>
			<td><?php echo $entity['extid']; ?></td>
			<td><?php echo $entity['charid']; ?></td>
			<td><?php echo $entity['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entities', 'action' => 'view', $entity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entities', 'action' => 'edit', $entity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entities', 'action' => 'delete', $entity['id']), null, __('Are you sure you want to delete # %s?', $entity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Roles'); ?></h3>
	<?php if (!empty($acode['Role'])): ?>
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
		foreach ($acode['Role'] as $role): ?>
		<tr>
			<td><?php echo $role['id']; ?></td>
			<td><?php echo $role['extid']; ?></td>
			<td><?php echo $role['charid']; ?></td>
			<td><?php echo $role['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'roles', 'action' => 'view', $role['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'roles', 'action' => 'edit', $role['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'roles', 'action' => 'delete', $role['id']), null, __('Are you sure you want to delete # %s?', $role['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($acode['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Extid'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($acode['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['extid']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

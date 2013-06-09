<div class="roles view">
<h2><?php  echo __('Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extid'); ?></dt>
		<dd>
			<?php echo h($role['Role']['extid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charid'); ?></dt>
		<dd>
			<?php echo h($role['Role']['charid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($role['Role']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acodes'), array('controller' => 'acodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Acodes'); ?></h3>
	<?php if (!empty($role['Acode'])): ?>
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
		foreach ($role['Acode'] as $acode): ?>
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
<div class="related">
	<h3><?php echo __('Related Roles (parent)'); ?></h3>
	<?php if (!empty($role['ParentRole'])): ?>
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
		foreach ($role['ParentRole'] as $r): ?>
		<tr>
			<td><?php echo $r['id']; ?></td>
			<td><?php echo $r['extid']; ?></td>
			<td><?php echo $r['charid']; ?></td>
			<td><?php echo $r['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'roles', 'action' => 'view', $r['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'roles', 'action' => 'edit', $r['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'roles', 'action' => 'delete', $r['id']), null, __('Are you sure you want to delete # %s?', $r['id'])); ?>
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
	<h3><?php echo __('Related Roles (child)'); ?></h3>
	<?php if (!empty($role['ChildRole'])): ?>
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
		foreach ($role['ChildRole'] as $r): ?>
		<tr>
			<td><?php echo $r['id']; ?></td>
			<td><?php echo $r['extid']; ?></td>
			<td><?php echo $r['charid']; ?></td>
			<td><?php echo $r['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'roles', 'action' => 'view', $r['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'roles', 'action' => 'edit', $r['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'roles', 'action' => 'delete', $r['id']), null, __('Are you sure you want to delete # %s?', $r['id'])); ?>
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
	<?php if (!empty($role['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Extid'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($role['User'] as $user): ?>
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

<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($role['Role'], '$role');

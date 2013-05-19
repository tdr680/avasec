<!-- <div class="entities index"> -->
	<h2><?php echo __('WFC'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('charid'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_typ_id'); ?></th>
			<th><?php echo $this->Paginator->sort('wfc_action_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entities as $entity): ?>
	<tr>
		<td><?php echo h($entity['EntityWfc']['id']); ?>&nbsp;</td>
		<td><?php echo h($entity['EntityWfc']['name']); ?>&nbsp;</td>
		<td><?php echo h($entity['EntityWfc']['charid']); ?>&nbsp;</td>
		<td><?php echo h($entity['Mtyp']['name'].' ('.$entity['EntityWfc']['meta_typ_id'].')'); ?>&nbsp;</td>
		<td><?php echo h($entity['EntityWfc']['wfc_action_id']); ?>&nbsp;</td>
		<td><?php echo h($entity['EntityWfc']['status_name'].' ('.$entity['EntityWfc']['status_id'].')'); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entity['EntityWfc']['id'], 'wfc')); ?>
			<!-- <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entity['Entity']['id'])); ?> -->
			<!-- <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entity['Entity']['id']), null, __('Are you sure you want to delete # %s?', $entity['Entity']['id'])); ?> -->
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
<!-- </div> -->
<!-- <div class="actions"> -->
<!-- 	<h3><?php echo __('Actions'); ?></h3> -->
<!-- 	<ul> -->
<!-- 		<li><?php echo $this->Html->link(__('New Entity'), array('action' => 'add')); ?></li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Acodes'), array('controller' => 'acodes', 'action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Acode'), array('controller' => 'acodes', 'action' => 'add')); ?> </li> -->
<!-- 	</ul> -->
<!-- </div> -->

<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($entities);
//echo $this->Html->tag('pre'); print_r($users);

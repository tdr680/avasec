<!-- File: /app/View/Users/index.ctp -->

<h1>Users</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Login</th>
    <th>Version</th>
    <th>Name</th>
  </tr>

  <!-- Here is where we loop through our $users array, printing out user info -->

  <?php foreach ($users as $user): ?>
  <tr>
    <td><?php echo $user['User']['id']; ?></td>
    <td>
      <?php echo $this->Html->link($user['User']['login'],
      array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
    </td>
    <td><?php echo $user['User']['user_ver_id']; ?></td>
    <td><?php echo $user['User']['name']; ?></td>
  </tr>
  <?php endforeach; ?>
  <?php unset($user); ?>
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

<?php
//App::import('Lib', 'DebugKit.FireCake');
//firecake($users);
//echo $this->Html->tag('pre'); print_r($users);


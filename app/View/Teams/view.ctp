<!-- File: /app/View/Teams/view.ctp -->

<h1><?php echo h($team['Team']['id']); ?></h1>
<h1><?php echo h($team['Team']['name']); ?></h1>

<h1>Members</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Login</th>
    <th>Version</th>
    <th>Name</th>
  </tr>
  <?php foreach ($team['Member'] as $user): ?>
  <tr>
    <td><?php echo $user['id']; ?></td>
    <td>
      <?php echo $this->Html->link($user['login'],
      array('controller'=>'users', 'action'=>'view', $user['id'])); ?>
    </td>
    <td><?php echo $user['user_ver_id']; ?></td>
    <td><?php echo $user['name']; ?></td>
  </tr>
  <?php endforeach; ?>
  <?php unset($user); ?>
</table>

<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($team);

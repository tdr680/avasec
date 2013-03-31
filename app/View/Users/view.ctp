<!-- File: /app/View/Users/view.ctp -->

<h1><?php echo h($user['User']['login']); ?></h1>

<p><small>Version: <?php echo $user['User']['user_ver_id']; ?></small></p>

<p><?php echo h($user['User']['name']); ?></p>

<h1>History</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
  </tr>
  <?php foreach ($user_ver as $uv): ?>
  <tr>
    <td><?php echo $uv['UserVer']['id'];   ?></td>
    <td>
      <?php echo $this->Html->link($uv['UserVer']['name'],
      array('controller'=>'users', 'action'=>'ver', $uv['UserVer']['id'])); ?>
    </td>
  <?php endforeach; ?>
  <?php unset($uv); ?>
</table>

<h1>Teams</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
  </tr>
  <?php foreach ($user['Team'] as $team): ?>
  <tr>
    <td><?php echo $team['id'];   ?></td>
    <td>
      <?php echo $this->Html->link($team['name'],
      array('controller'=>'teams', 'action'=>'view', $team['id'])); ?>
    </td>
  <?php endforeach; ?>
  <?php unset($uv); ?>
</table>


<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($user);
firecake($user_ver);

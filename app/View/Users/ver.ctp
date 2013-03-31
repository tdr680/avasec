<!-- File: /app/View/Users/ver.ctp -->

<h1>
<?php echo $this->Html->link($uv['User']['login'],
array('controller'=>'users', 'action'=>'view', $uv['User']['id'])); ?>
</h1>

<h1><?php echo h($uv['User']['id']); ?></h1>

<p><small>Version: <?php echo $uv['UserVer']['id']; ?></small></p>

<p><?php echo h($uv['UserVer']['name']); ?></p>

<h1>Teams</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
  </tr>
  <?php foreach ($uv['Team'] as $team): ?>
  <tr>
    <td><?php echo $team['id'];   ?></td>
    <td>
      <?php echo $this->Html->link($team['name'],
      array('controller'=>'teams', 'action'=>'view', $team['id'])); ?>
    </td>
  <?php endforeach; ?>
  <?php unset($team); ?>
</table>


<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($uv);

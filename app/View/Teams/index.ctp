<!-- File: /app/View/Teams/index.ctp -->

<h1>Teams</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
  </tr>

  <!-- Here is where we loop through our $teams array, printing out team info -->

  <?php foreach ($teams as $team): ?>
  <tr>
    <td><?php echo $team['Team']['id']; ?></td>
    <td>
    <?php echo $this->Html->link($team['Team']['name'],
    array('controller'=>'teams', 'action'=>'view', $team['Team']['id'])); ?>
    </td>
  </tr>
  <?php endforeach; ?>
  <?php unset($team); ?>
</table>

<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($teams);
//echo $this->Html->tag('pre'); print_r($teams);


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
    <td class="row">
    <?php echo $this->Html->link($team['Team']['name'],
    array('controller'=>'teams', 'action'=>'view', $team['Team']['id'])); ?>
    </td>
  </tr>
  <?php endforeach; ?>
  <?php unset($team); ?>
</table>

<script type="text/javascript">
   $(document).ready(function(){
       $.post("/avasec/ajax/test", { id:3 },
              function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
              });
     });

$(document).ready(function(){
    $(".row").hover(function(){
        console.log("You entered row");
      },
      function(){
        console.log("Bye!");
      }); 
  });

</script>

<?php
App::import('Lib', 'DebugKit.FireCake');
firecake($teams);
//echo $this->Html->tag('pre'); print_r($teams);


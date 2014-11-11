<div class="row-fluid span6">
  <?PHP echo $this->Html->link('Add New Event', array('controller' => 'events', 'action' => 'add_event'), array('class' => 'btn')); ?>
</div>
<?php
if (empty($events)) {

  echo '<h3>No Events</h3>';
} else {
  ?>

  <br/><br/><br/>
  <div class="row-fluid span6">
    <table style="width:100%">
      <tr style="font-size: 16px;">
        <td><?php echo $this->Paginator->sort('Event.name','Name'); ?></td>
        <td><?php echo $this->Paginator->sort('Event.reference','Reference'); ?></td>
        <td><?php echo $this->Paginator->sort('Event.category_id','Category'); ?></td>
        <td><?php echo $this->Paginator->sort('Event.start_date','Start Date'); ?></td>
        <td><?php echo $this->Paginator->sort('Event.end_date','End Date'); ?></td>
        <td><?php echo $this->Paginator->sort('Event.status','Status'); ?></td>       
        <td>Actions</td>
      </tr>
  <?php 
  foreach ($events as $event) { 
    if (!$event['Event']['status'] == '1') {
      $bgcolor='lightgrey';
    } else {
      $bgcolor='white';
    }
    ?>
        <tr>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $event['Event']['name']; ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $event['Event']['reference']; ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $this->Status->translateCategories($event['Event']['category_id']); ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $event['Event']['start_date']; ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $event['Event']['end_date']; ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php echo $this->Status->translateUserStatus($event['Event']['status']); ?></td>
          <td bgcolor="<?php echo $bgcolor; ?>"><?php
    echo $this->Html->link('view', array('action' => 'view_event', $event['Event']['id']));
    echo ' | ';
    echo $this->Html->link('approve', array('action' => 'approve_event', $event['Event']['id']));
    ?>



          </td>
        </tr>
          <?php } ?>
    </table>
  </div>    







<?php } ?>
<?php
echo $this->element('pagination_controls');
?>

<div class="row-fluid span6">
    <?PHP echo $this->Html->link('Add New Event', array('controller' => 'events', 'action' => 'add_event'), array('class' => 'btn')); ?>
</div>
<?php


if(empty($events)){
    
    echo '<h3>No Events</h3>';
    
} else {

?>

<br/><br/><br/>
<div class="row-fluid span6">
    <table style="width:100%">
        <tr style="font-size: 16px;">
            <td>Name</td>
            <td>Reference</td>
            <td>Category</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        <?php foreach ($events as $event){ ?>
        <tr>
            <td><?php echo $event['Event']['name']; ?></td>
            <td><?php echo $event['Event']['reference']; ?></td>
            <td><?php echo $this->Status->translateCategories($event['Event']['category_id']); ?></td>
            <td><?php echo $event['Event']['start_date']; ?></td>
            <td><?php echo $event['Event']['end_date']; ?></td>
            <td><?php echo $this->Status->translateUserStatus($event['Event']['status']); ?></td>
            <td><?php echo $this->Html->link('view',array('action' => 'view_event',$event['Event']['id']));
                      echo ' | ';
                      echo $this->Html->link('approve',array('action' => 'approve_event',$event['Event']['id']));
                    
                    
                    
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

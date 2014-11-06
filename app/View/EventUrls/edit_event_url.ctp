<?php

//SHOULD BE ABLE TO ADD MULTIPLE TICKETS TO AN EVENT
?>
<?php   echo $this->Form->create('EventUrl', array('role' => 'form')); ?>
<?php echo $this->Form->input('name', array('type' => 'text', 'placeholder' => 'Website Name', 'label' => 'Website Name')); ?>
<?php echo $this->Form->input('url', array('type' => 'text', 'placeholder' => 'http://www.mywebsite.com', 'label' => 'Website URL')); ?>
<?php echo $this->Form->input('url_type_id', array('type' => 'hidden', 'value' => 'de38fd8e-1d40-11e4-be70-04011d4c4a01')); ?>
<?php echo $this->Form->input('event_id', array('type' => 'hidden', 'value' => $event_id)); ?>
<?php echo $this->Form->button('Add Website', array('type' => 'submit', 'class' => 'btn')) . ' ' . $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'view_event', $event_id), array('class' => 'btn')); ?>

<?php echo $this->Form->end(); ?>
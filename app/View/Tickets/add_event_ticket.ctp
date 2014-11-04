<?php 
//SHOULD BE ABLE TO ADD MULTIPLE TICKETS TO AN EVENT
?>

<?php echo $this->Form->create('Ticket', array('role' => 'form', 'class' => 'form_validate')); ?>
<?php   echo $this->Form->input('event_id', array('type' => 'hidden','value' => $event_id)); ?>
<div class="row-fluid">
	<div class="span6"> 
		<?php 
			echo $this->Form->input(
			'ticket_name', array(
				'type' => 'text',
				'label' => 'Ticket Name',
				'class' => 'form-control input100',
				'div' => array(
					'class' => 'form-group'
				)
			)); 
		?>
	</div>
	<div class="span6"> 
		<?php 
			echo $this->Form->input(
			'price', array(
				'type' => 'text',
				'label' => 'Ticket Price',
				'class' => 'form-control input100',
				'div' => array(
					'class' => 'form-group'
				)
			));
			?>
	</div>
</div>
<div class="row-fluid">
	<div class="span12"> 
		<?php 
		echo $this->Form->button(
			'Add Ticket',array(
			'type' => 'submit', 
			'class'=> 'btn'
		));
		?> 
            <?php 
		echo $this->Form->button(
			'Reset',array(
			'type' => 'reset', 
			'class'=> 'btn'
		));
		?> 
            <?php 
		echo $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'view_event',$event_id), array('class' => 'btn'));
		?> 
	</div>
        
</div>
<?php echo $this->Form->end(); ?>
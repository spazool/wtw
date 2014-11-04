<h2>Add Event</h2>
<p>Here you are able to add a new event to the calendar. If you have added an event previously, you will be able to reuse data that has already been recorded (eg. Venue, organiser details)</p>
<br />
<br />
<?php echo $this->Form->create('Event', array('role' => 'form', 'class' => 'form_validate')); ?>

<div class="row-fluid">
	<div class="span8">
	<?php 
		echo $this->Form->input(
			'name', array(
			'type' => 'text',
			'label' => 'Event Name',
			'class' => 'form-control input100',
			'div' => array(
				'class' => 'form-group'
			)
		)); 
	?>
	</div>
</div>
<div class="row-fluid">
	<div class="span8">
	<?php
		echo $this->Form->input(
		'description',  array(
			'type' => 'text',
			'label' => 'Description', 
			'class' => 'form-control input100',
			'div' => array(
				'class' => 'form-group'
			),
			'type' => 'textarea'
		));
	?>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
	<?php
		echo $this->Form->input(
		'start_date', array(
			'type' => 'text',
			'label' => 'Start Date',
			'class' => 'form-control input100 datepicker',
			'div' => array(
				'class' => 'form-group'
			)
		)); 
	?>
	</div>
	<div class="span6">
	<?php 
		echo $this->Form->input(
		'end_date', array(
			'type' => 'text',
			'label' => 'End Date',
			'class' => 'form-control input100 datepicker',
			'div' => array(
				'class' => 'form-group'
			)
		)); 
	?>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
	<?php 
		echo $this->Form->input(
		'start_time',  array(
			'label' => 'Start Time', 
			'options' => $times_dropdown,
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
		'end_time',  array(
			'label' => 'End Time', 
			'options' => $times_dropdown,
			'class' => 'form-control input100',
			'div' => array(
				'class' => 'form-group'
			)
		)); 
	?>
	</div>
</div>
<div class="row-fluid">
	<div class="span6"> 
		<?php 
			echo $this->Form->input(
			'email', array(
				'type' => 'email',
				'label' => 'Email',
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
			'telephone', array(
				'type' => 'text',
				'label' => 'Telephone Number',
				'class' => 'form-control input100',
				'div' => array(
					'class' => 'form-group'
				)
			));
			?>
	</div>
</div>
<div class="row-fluid">
	<div class="span6"> 
		<?php 
		echo $this->Form->input(
			'category_id', array(
			'type' => 'select',
			'label' => 'Category',
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
			'Add Event',array(
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
		echo $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'my_events'), array('class' => 'btn'));
		?> 
	</div>
        
</div>
<?php echo $this->Form->end(); ?>
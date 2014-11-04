<h2>Add Event Image</h2>
<?php echo $this->Form->create('Event', array('type' => 'file','role' => 'form', 'class' => 'form_validate')); ?>
<div class="row-fluid">
	<div class="span8">
	<?php 
		echo $this->Form->input(
			'logo', array(
			'type' => 'file',
			'label' => 'Select Image',
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
			'Add Image',array(
			'type' => 'submit', 
			'class'=> 'btn'
		));
		?> 
            <?php 
		echo $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'view_event',$event_id), array('class' => 'btn'));
		?> 
	</div>
        
</div>

<?php echo $this->Form->end(); ?>
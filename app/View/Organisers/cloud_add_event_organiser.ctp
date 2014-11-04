<section class="content-header">
    <h1>
        Add Event Organiser
    </h1>
</section>
<section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Organiser</h3>
            </div><!-- /.box-header -->
                                
            <?php   echo $this->Form->create('Organiser', array('role' => 'form')); ?>
                <div class="box-body">
                    <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('organiser_name', array('type' => 'text','placeholder' => 'Company Name','class' => 'form-control','label' => 'Organiser Name')); ?>
                        </div>
                    </div>
                    
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('contact_name', array('type' => 'text','placeholder' => 'Joe Soap','class' => 'form-control','label' => 'Contact Name')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('email', array('type' => 'text','placeholder' => 'organiser@example.com','class' => 'form-control','label' => 'Email')); ?>
                        </div>
                    </div>
                    
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('telephone', array('type' => 'text','placeholder' => '27114345555','class' => 'form-control','label' => 'Phone')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('website', array('type' => 'text','placeholder' => 'www.organiserwebsite.com','class' => 'form-control','label' => 'Website')); ?>
                        </div>
                    </div>
                    </div>
                    <?php echo $this->Form->button('Add Organiser',array('type' => 'submit','class' => 'btn btn-success btn-flat'));?> 
              
            <?php echo $this->Form->end(); ?>
                    
            </div><!-- /.box-body -->
            
    
    </div><!-- /.box -->
</div><!--/.col (left) -->
</div>
</section>
 

<h2>Add Organiser</h2>

<br />
<?php echo $this->Form->create('Organiser', array('role' => 'form', 'class' => 'form_validate')); ?>

<div class="row-fluid">
	<div class="span8">
	<?php 
		echo $this->Form->input(
			'organiser_name', array(
			'type' => 'text',
			'label' => 'Organiser Company Name',
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
			'contact_name', array(
			'type' => 'text',
			'label' => 'Contact Name',
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
		'website',  array(
			'type' => 'text',
			'label' => 'Website', 
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
		'email',  array(
			'type' => 'text',
			'label' => 'email', 
			'class' => 'form-control input100',
			'div' => array(
				'class' => 'form-group'
			)
		));
	?>
	</div>
</div>
<div class="row-fluid">
	<div class="span4">
	<?php
		echo $this->Form->input(
		'phone',  array(
			'type' => 'text',
			'label' => 'phone', 
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
			'Add Organiser',array(
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
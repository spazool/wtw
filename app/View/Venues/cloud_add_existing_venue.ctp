<section class="content-header">
    <h1>
        Choose an existing Venue
    </h1>
</section>
<section class="content">
    <div class="row">
        <?php   echo $this->Form->create('Venue', array('role' => 'form')); ?>
        <div class='col-md-6'>
            <div class="form-group">
                <?php   echo $this->Form->input('Venue.venue_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select Venue', 'empty' => '-- Select Venue--')); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              
              <?php echo $this->Form->button('Add Venue for Event',array('type' => 'submit','class' => 'btn btn-success btn-flat'));?> 
              <?php echo $this->Html->link('Create a New Venue', array('controller' => 'Venues', 'action' => 'cloud_add_event_venue',$event_id), array('class' => 'btn btn-info btn-flat'));?>
              <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>


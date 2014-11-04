
<?php echo $this->Html->css('/css/daterangepicker/daterangepicker-bs3.css');?>
<?php echo $this->Html->css('/css/timepicker/bootstrap-timepicker.min.css');?>
<?php echo $this->Html->script('/js/plugins/daterangepicker/daterangepicker.js',array('inline' => true)); ?>
<?php echo $this->Html->script('/js/plugins/timepicker/bootstrap-timepicker.min.js',array('inline' => true)); ?>


<section class="content-header">
    <h1>
        Add Event
        
    </h1>
    
</section>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Event Details</h3>
            </div><!-- /.box-header -->
                                
            
                <div class="box-body">
                    <?php   echo $this->Form->create('Event', array('role' => 'form')); ?>
                    <div class="row">
                        
                    <div class='col-md-6'>
                   
                        <div class="form-group">
                            <?php echo $this->Form->input('name', array('type' => 'text','placeholder' => 'Event Name','class' => 'form-control','label' => 'Event Name')); ?>
                        </div>
                   
                    </div>
                    </div>
                    <div class="row">
                        
                    <div class='col-md-12'>
                        <div class="form-group">
                            <?php echo $this->Form->input('description', array('type' => 'text','placeholder' => 'Event Description','class' => 'form-control','label' => 'Description')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('email', array('type' => 'text','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Email')); ?>
                        </div>
                    </div>
                    
                    <div class='col-md-6'>
                        <div class="form-group">
                            <?php echo $this->Form->input('telephone', array('type' => 'text','placeholder' => '27114345555','class' => 'form-control','label' => 'Telephone')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class='col-md-12'>
                    <div class="form-group">
                        <label>Choose from to date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            
                            <?php echo $this->Form->input('date_to_from', array('type' => 'text','class' => 'form-control pull-right','label' => false,'div' => false)); ?>
                        </div><!-- /.input group -->
                    </div>
                        </div></div>
                    <div class="row">
                        <div class='col-md-3'>
                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            
                                            <div class="input-group">                                            
                                                <?php echo $this->Form->input('start_time', array('type' => 'text','class' => 'form-control timepicker','label' => 'Start Time')); ?>
                                                
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                            </div>
                        <div class='col-md-3'>
                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            
                                            <div class="input-group">                                            
                                                <?php echo $this->Form->input('end_time', array('type' => 'text','class' => 'form-control timepicker','label' => 'End Time')); ?>
                                                
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                            </div>
                        
                        </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <?php   echo $this->Form->input('provider_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select Provider', 'empty' => '-- Select Provider--')); ?>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <?php   echo $this->Form->input('category_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select Category', 'empty' => '-- Select Category--')); ?>
                            </div>
                        </div>
                    </div>    
                        
                        <?php echo $this->Form->button('Add Event',array('type' => 'submit','class' => 'btn btn-success btn-flat'));?> 
                        <?php echo $this->Form->end(); ?>   
                    
                    
            </div><!-- /.box-body -->

    
    </div><!-- /.box -->
</div><!--/.col (left) -->
</div>   <!-- /.row -->

</section>

<script type="text/javascript">
    $(function() {
        
        $('#EventDateToFrom').daterangepicker();
        $(".timepicker").timepicker({
                    showInputs: false
        });
        
        
                
    });
</script>    

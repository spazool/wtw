<section class="content-header">
    <h1>
        Add Event Tickets
    </h1>
</section>
<section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tickets</h3>
            </div><!-- /.box-header -->
                                
            <?php   echo $this->Form->create('Ticket', array('role' => 'form')); ?>
                <div class="box-body">
                    <?php $count = 0; ?>
                    <div id="tickets">
                    <?php if(isset($tickets)){ ?>
                    <?php foreach ($tickets as $ticket) { ?>
                        <div class="row ele<?php echo $count; ?>">
<!--                            <script type="text/javascript">
                                $('.del<?php // echo $count; ?>').on('click', function() {        
                                    $(".ele<?php // echo $count; ?>").remove();
                                });
                            </script>-->
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <?php echo $this->Form->input($count.'.Ticket.ticket_name', array('type' => 'text','placeholder' => 'VIP','class' => 'form-control','label' => 'Ticket Name')); ?>
                                </div>
                            </div>

                            <div class='col-md-3'>
                                <div class="form-group">
                                    <?php echo $this->Form->input($count.'.Ticket.price', array('type' => 'text','placeholder' => 'R200','class' => 'form-control','label' => 'Ticket Price')); ?>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <br/>
<!--                                
                                <?php // echo $this->Html->link('Delete Ticket', array('controller' => 'Tickets', 'action' => 'cloud_delete_ticket',$event_id,$this->data[$count]['Ticket']['id']), array('class' => 'btn btn-danger btn-flat delete del','style' => 'margin-top: 4px'));?>
                                <button class="btn btn-danger btn-flat delete del<?php echo $count; ?>" style ="margin-top: 4px;">Delete Ticket</button>-->
                            </div>
                        </div>
                    
                    
                    
                    <?php $count++; ?>
                    <?php } ?>
                    <?php } ?>
                    
                    
                    </div>
                    <a class="btn btn-success btn-flat" id="addTicket">Add Another Ticket</a>
                    <?php echo $this->Form->button('Save Tickets',array('type' => 'submit','class' => 'btn btn-success btn-flat'));?> 
              
            <?php echo $this->Form->end(); ?>
                    
            </div><!-- /.box-body -->
            
    
    </div><!-- /.box -->
</div><!--/.col (left) -->
</div>
</section>
<script type="text/javascript">
    $(function() {
        
        var ticketCount = <?php echo $count; ?>;
        $("#addTicket").click(function() {
               
            // AJAX fetch a message type element
            $.ajax({
                url: '../renderElement/' + ticketCount + '/',
                type: 'GET',
                success: function(html) {

                   $("#tickets").append(html);
                   ticketCount++;
                }
           });      
        });
    });
</script> 
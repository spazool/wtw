
    <div class="row ele<?php echo $count; ?>">
        <script type="text/javascript">
            $('.del<?php echo $count; ?>').on('click', function() {        
                $(".ele<?php echo $count; ?>").remove();
            });
        </script>
        
        
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
            <button class="btn btn-danger btn-flat delete del<?php echo $count; ?>" style ="margin-top: 4px;">Delete Ticket</button>
        </div>
    </div>


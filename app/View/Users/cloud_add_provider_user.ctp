<div class='row'>
    
    <div class='col-md-12'>
        
        <div class='box box-primary'>
            <div class='box-header'>
                <h3 class='box-title'>Add User</h3>
            </div>
            <div class="box-body">
                <div class='col-md-6'>
                 <?php   echo $this->Form->create('User', array('role' => 'form')); ?>
                <div class='form-group'>
                    <?php   echo $this->Form->input('Data.user_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('Data.provider_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
                </div>
            </div>
            
            <div class='col-md-12'>
                <div class='form-group'>
                <p>Please NOTE: This will link the user selected to the selected provider.</p>
                </div>
                    
            </div>
            
            </div>
            <div class="box-footer">
                <?php echo $this->Form->button('Add Provider User',array('type' => 'submit','class' => 'btn btn-primary')); ?> 
            </div>
           
                   
                    
            <?php echo $this->Form->end(); ?>
            
        </div>
        
        
    </div>
    
    
</div>
<div class='row'>
    
    <div class='col-md-12'>
        
        <div class='box box-primary'>
            <div class='box-header'>
                <h3 class='box-title'>Add User</h3>
            </div>
            <?php   echo $this->Form->create('User', array('role' => 'form')); ?>
            <div class="box-body">
                <div class='col-md-6'>
                    
                <div class='form-group'>
                    <?php   echo $this->Form->input('first_name', array('type' => 'text','placeholder' => 'Joe','class' => 'form-control','label' => false)); ?>
                </div>
                    
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php echo $this->Form->input('last_name', array('type' => 'text','placeholder' => 'Soap','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('email', array('type' => 'text','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('permission_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-12'>
                <div class='form-group'>
                <p>Please NOTE: User will be sent an email with a link to create a password.</p>
                </div>
                    
            </div>
            
            </div>
            <div class="box-footer">
                <?php echo $this->Form->button('Add User',array('type' => 'submit','class' => 'btn btn-primary'));?> 
            </div>
            
           
                   
                    
            <?php echo $this->Form->end(); ?>
            
        </div>
        
        
    </div>
    
    
</div>
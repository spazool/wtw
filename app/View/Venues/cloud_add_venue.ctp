<div class='row'>
    
    <div class='col-md-12'>
        
        <div class='box box-primary'>
            <div class='box-header'>
                <h3 class='box-title'>Add Venue</h3>
            </div>
            <div class="box-body">
                <div class='col-md-6'>
                    <?php   echo $this->Form->create('Venue', array('role' => 'form')); ?>
                <div class='form-group'>
                    <?php   echo $this->Form->input('name', array('type' => 'text','placeholder' => 'Venue Name','class' => 'form-control','label' => false)); ?>
                </div>
                    
                    
            </div>
            <div class='col-md-12'>
                <div class='form-group'>
                    <?php echo $this->Form->input('description', array('type' => 'text','placeholder' => 'A Discription about the Venue','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('website', array('type' => 'text','placeholder' => 'Website - www.example.com','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('email', array('type' => 'text','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('phone', array('type' => 'text','placeholder' => 'PHONE 27112223333','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            
            <div class='col-md-12'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('address_line_one', array('type' => 'text','placeholder' => 'Address Line One','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('address_line_two', array('type' => 'text','placeholder' => 'Address Line Two','class' => 'form-control','label' => false)); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('c.country_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Country --')); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('c.province_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Province--')); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('c.city_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select City--')); ?>
                </div>
                    
            </div>
            
            <div class='col-md-12'>
                <div class='form-group'>
                <p>Please NOTE: Venues created here are Open Venues, meaning, common Venues - do not add venues that are not used often</p>
                </div>
                    
            </div>
            
            </div>
            <div class='col-md-12'>
                <div class="box-footer">
                
                    <?php echo $this->Form->button('Add Venue',array('type' => 'submit','class' => 'btn btn-primary'));?> 
                 
                </div>
            </div>
            
            
            
           
                   
                    
            <?php echo $this->Form->end(); ?>
            
        </div>
        
        
    </div>
    
    
</div>

<?php
$this->Js->get('#cCountryId')->event('change', 
	$this->Js->request(array(
		'controller'=>'Provinces',
		'action'=>'cloud_getByCountry'
		), array(
		'update'=>'#cProvinceId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);

$this->Js->get('#cProvinceId')->event('change', 
	$this->Js->request(array(
		'controller'=>'Cities',
		'action'=>'cloud_getByProvince'
		), array(
		'update'=>'#cCityId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
?>
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
                    <?php   echo $this->Form->input('country_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Country --')); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('province_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Province--')); ?>
                </div>
                    
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <?php   echo $this->Form->input('city_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select City--')); ?>
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
                
                    <?php echo $this->Form->button('Add Venue',array('type' => 'submit','class' => 'btn btn-success btn-flat'));?> 
                    <?php echo $this->Html->link('Choose Existing Venue', array('controller' => 'Venues', 'action' => 'cloud_add_existing_venue',$event_id), array('class' => 'btn btn-info btn-flat'));?>
                </div>
            </div>
            
            <?php echo $this->Form->end(); ?>
            
        </div>
        
        
    </div>
    
    
</div>

<?php
$this->Js->get('#VenueCountryId')->event('change', 
	$this->Js->request(array(
		'controller'=>'Provinces',
		'action'=>'cloud_getByCountry'
		), array(
		'update'=>'#VenueProvinceId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);

$this->Js->get('#VenueProvinceId')->event('change', 
	$this->Js->request(array(
		'controller'=>'Cities',
		'action'=>'cloud_getByProvince'
		), array(
		'update'=>'#VenueCityId',
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
<h2>Add Venue</h2>

<br />
<?php echo $this->Form->create('Venue', array('role' => 'form', 'class' => 'form_validate')); ?>

<div class="row-fluid">
  <div class="span8">
    <?php
    echo $this->Form->input(
            'name', array(
        'type' => 'text',
        'label' => 'Venue Name',
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
            'description', array(
        'type' => 'text',
        'label' => 'Description',
        'class' => 'form-control input100',
        'div' => array(
            'class' => 'form-group'
        ),
        'type' => 'textarea'
    ));
    ?>
  </div>
</div>
<div class="row-fluid">
  <div class="span6">
    <?php
    echo $this->Form->input(
            'website', array(
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
        'email', array(
    'type' => 'text',
    'label' => 'Email',
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
        'phone', array(
    'type' => 'text',
    'label' => 'Phone',
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
        'address_line_one', array(
    'type' => 'text',
    'label' => 'Address Line One',
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
        'address_line_two', array(
    'type' => 'text',
    'label' => 'Address Line Two',
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
        'country_id', array(
    'type' => 'select',
    'label' => 'Country',
    'class' => 'form-control input100',
    'div' => array(
        'class' => 'form-group'
    ),
    'empty' => '-- Select Country--'
));
?>
  </div>
  <div class="span4"> 
<?php
echo $this->Form->input(
        'province_id', array(
    'type' => 'select',
    'label' => 'Province',
    'class' => 'form-control input100',
    'div' => array(
        'class' => 'form-group'
    ),
    'empty' => '-- Select Province--'
));
?>
  </div>
  <div class="span4"> 
<?php
echo $this->Form->input(
        'city_id', array(
    'type' => 'select',
    'label' => 'City',
    'class' => 'form-control input100',
    'div' => array(
        'class' => 'form-group'
    ),
    'empty' => '-- Select City--'
));
?>
  </div>
</div>
<div class="row-fluid">
  <div class="span12"> 
<?php
echo $this->Form->button(
        'Add Venue', array(
    'type' => 'submit',
    'class' => 'btn'
));
?> 
    <?php
    echo $this->Form->button(
            'Reset', array(
        'type' => 'reset',
        'class' => 'btn'
    ));
    ?> 
    <?php
    echo $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'view_event', $event_id), array('class' => 'btn'));
    ?> 
  </div>

</div>
<?php echo $this->Form->end(); ?>

<?php
//$this->Js->get('#cCountryId')->event('change', 
//	$this->Js->request(array(
//		'controller'=>'Provinces',
//		'action'=>'cloud_getByCountry'
//		), array(
//		'update'=>'#cProvinceId',
//		'async' => true,
//		'method' => 'post',
//		'dataExpression'=>true,
//		'data'=> $this->Js->serializeForm(array(
//			'isForm' => true,
//			'inline' => true
//			))
//		))
//	);

$this->Js->get('#VenueProvinceId')->event('change', $this->Js->request(array(
            'controller' => 'Cities',
            'action' => 'getByProvince'
                ), array(
            'update' => '#VenueCityId',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
);
?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer'))
  echo $this->Js->writeBuffer();
// Writes cached scripts
?>


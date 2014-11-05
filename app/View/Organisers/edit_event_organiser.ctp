<h2>Add Organiser</h2>

<br />
<?php echo $this->Form->create('Organiser', array('role' => 'form', 'class' => 'form_validate')); ?>

<div class="row-fluid">
  <div class="span8">
    <?php
    echo $this->Form->input(
            'organiser_name', array(
        'type' => 'text',
        'label' => 'Company Name',
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
        'telephone', array(
    'type' => 'text',
    'label' => 'Telephone',
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
        'Add Organiser', array(
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
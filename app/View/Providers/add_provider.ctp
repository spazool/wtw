<?php   echo $this->Form->create('Provider', array('role' => 'form')); ?>
<?php   echo $this->Form->input('name', array('type' => 'text','placeholder' => 'Provider Name','class' => 'form-control','label' => false)); ?>
<?php echo $this->Form->input('description', array('type' => 'text','placeholder' => 'A Discription about the Provider','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('contact_name', array('type' => 'text','placeholder' => 'Contact Name eg: Joe Soap','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('email', array('type' => 'text','placeholder' => 'joe@example.com','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('phone', array('type' => 'text','placeholder' => 'PHONE 27112223333','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('fax', array('type' => 'text','placeholder' => 'FAX 27112223333','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('website', array('type' => 'text','placeholder' => 'www.example.com','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('address_line_one', array('type' => 'text','placeholder' => 'Address Line One','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('address_line_two', array('type' => 'text','placeholder' => 'Address Line Two','class' => 'form-control','label' => false)); ?>
<?php   echo $this->Form->input('country_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Country --')); ?>
<?php   echo $this->Form->input('province_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select Province--')); ?>
<?php   echo $this->Form->input('city_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => false, 'empty' => '-- Select City--')); ?>
<?php echo $this->Form->button('Add Provider',array('type' => 'submit','class' => 'btn btn-primary'));?> 
<h2>Edit Profile</h2>
<p>Some info on what this screen does</p>
<br />
<br />
<?php   echo $this->Form->create('User', array('role' => 'form')); ?>
<div class="row-fluid">
	<div class="span6">
		<?php   echo $this->Form->input('first_name', array('type' => 'text','placeholder' => 'Joe','label' => 'First Name')); ?>
	</div>
	<div class="span6">
		<?php   echo $this->Form->input('last_name', array('type' => 'text','placeholder' => 'Soap','label' => 'Last Name')); ?>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<?php   echo $this->Form->input('email', array('type' => 'email','placeholder' => 'joe@example.com','label' => 'Email', 'class' => 'input400')); ?>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
		<?php   echo $this->Form->input('password', array('type' => 'password','placeholder' => 'password','label' => 'Password')); ?>
	</div>
	<div class="span6">
		<?php   echo $this->Form->input('confirm_password', array('type' => 'password','placeholder' => 'confirm password','label' => 'Confirm Password')); ?>
	</div>
</div>
<?php echo $this->Form->button('Edit',array('type' => 'submit', 'class'=>'btn'));?> 
<?php echo $this->Form->end(); ?>
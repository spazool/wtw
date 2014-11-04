<h2>Register</h2>
<p>Use this form to register on the website. Registration allows you to create and manage events, as well as add and manage additional users as well as your detailed event and organisation details. Registration makes adding new events faster and simpler by reducing the amount of duplication.</p>
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
	<div class="span12">
		<?php   echo $this->Form->input('password', array('type' => 'password','placeholder' => 'password','label' => 'Password', 'class' => 'input400')); ?>
	</div>
</div>
<?php echo $this->Form->button('Register',array('type' => 'submit', 'class' => 'btn'));?> 
<?php echo $this->Form->end(); ?>
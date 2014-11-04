<h2>Login</h2>
<p>Login here to access your account. You may edit your account profile, manage users and access, as well as manage your existing and future event listings.</p>
<br />
<br />
<?php echo $this->Form->create('User', array('action' => 'login')); ?>
<?php echo $this->Form->input('email', array('type' => 'text','class' => 'form-control','placeholder' => 'youremail@example.com')); ?>
<?php echo $this->Form->input('password', array('type' => 'password','class' => 'form-control','placeholder' => 'your password')); ?>
<?php echo $this->Form->button('Login',array('type' => 'submit', 'class' => 'btn'));?>
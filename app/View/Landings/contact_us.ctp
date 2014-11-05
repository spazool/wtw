
<div class="row-fluid">
  <div class="span12">
    <h3>Contact Us</h3>
  </div>
</div>
<?php echo $this->Form->create('Landing', array('novalidate' => true, 'class' => 'jsvalidate')); ?>
<div class="row-fluid">
  <div class="span5 ">
    <div class="control-group">
      <div class="controls">
        <?php echo $this->Form->input('fullname', array('type' => 'text', 'class' => 'm-wrap span12', 'label' => 'Full Name', 'div' => array('class' => 'input'))); ?>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span5 ">
    <div class="control-group">
      <div class="controls">
        <?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'm-wrap span12 validate val-email email', 'placeholder' => '', 'label' => 'Email Address')); ?>
      </div>
    </div>
  </div>
  <div class="span5 ">
    <div class="control-group">
      <div class="controls">
        <?php echo $this->Form->input('mobile', array('type' => 'text', 'class' => 'm-wrap span12', 'label' => 'Telephone')); ?>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span5 ">
    <div class="control-group">
      <div class="controls">
        <?php echo $this->Form->input('subject', array('type' => 'select', 'options' => $subject, 'class' => 'm-wrap span12', 'label' => 'Subject')); ?> 
      </div>
    </div>
  </div>
</div>
<div class="row-fluid"> 
  <div class="span10">
    <div class="control-group">
      <div class="controls">
        <?php echo $this->Form->input('message', array('class' => 'm-wrap span12', 'label' => 'Message', 'type' => 'textarea')); ?> 
      </div>
    </div>
  </div>
</div>    
<div class="row-fluid form-controls"> 
  <div class="span5">
    <?php echo $this->Form->button('<i class="icon-ok"></i> Submit', array('type' => 'submit', 'id' => 'save', 'value' => 0, 'div' => false, 'class' => 'btn red')); ?>     
    <?php echo '&nbsp;' . $this->Html->link('<i class="icon-remove"></i> Cancel', array('controller' => 'events', 'action' => 'index'), array('class' => 'btn cancel', 'escape' => false)); ?>
  </div>
</div> 

<?php echo $this->Form->end(); ?>

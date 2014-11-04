<div id="venueEl"> 
<div class="row">
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $this->Form->input('Venue.name', array('type' => 'text','placeholder' => 'Venue Name','class' => 'form-control','label' => 'Venue')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-12'>
    <div class="form-group">
        <?php echo $this->Form->input('Venue.description', array('type' => 'text','placeholder' => 'R200','class' => 'form-control','label' => 'Description')); ?>
    </div>
    </div>
    
</div>
<div class="row">
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $this->Form->input('Venue.email', array('type' => 'text','placeholder' => 'venue@example.com','class' => 'form-control','label' => 'Email')); ?>
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $this->Form->input('Venue.phone', array('type' => 'text','placeholder' => '27114345555','class' => 'form-control','label' => 'Phone')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $this->Form->input('Venue.website', array('type' => 'text','placeholder' => 'www.venue.co.za','class' => 'form-control','label' => 'Website')); ?>
        </div>
    </div>
    
</div>
<div class="row">
    <div class='col-md-12'>
        <div class="form-group">
            <?php echo $this->Form->input('Venue.address_line_one', array('type' => 'text','placeholder' => 'venue@example.com','class' => 'form-control','label' => 'Address Line One')); ?>
        </div>
    </div>
    
</div>
<div class="row">
    <div class='col-md-6'>
            <div class="form-group">
                <?php echo $this->Form->input('Venue.address_line_two', array('type' => 'text','placeholder' => '27114345555','class' => 'form-control','label' => 'Address Line Two')); ?>
            </div>
    </div>
    <div class='col-md-6'>
            <div class="form-group">
                <?php   echo $this->Form->input('c.country_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select Country', 'empty' => '-- Select Country --')); ?>
            </div>
    </div>
    
</div>
<div class="row">
    <div class='col-md-6'>
            <div class="form-group">
                <?php   echo $this->Form->input('c.province_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select Province', 'empty' => '-- Select Province--')); ?>
            </div>
    </div>
    <div class='col-md-6'>
            <div class="form-group">
                <?php   echo $this->Form->input('c.city_id', array('type' => 'select','placeholder' => 'joe@example.com','class' => 'form-control','label' => 'Select City', 'empty' => '-- Select City--')); ?>
            </div>
    </div>
    
</div>


</div>    

    
    <div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'><?php echo $event['Event']['name']; ?></h3>
            </div>
            <div class='box-body'>
                <p><?php echo $event['Event']['description']; ?></p>
                <p>
                    <b>Dates: </b><?php echo $event['Event']['start_date']. ' to ' .$event['Event']['end_date']; ?> <br/><br/>
                    <b>Times: </b><?php echo $event['Event']['start_time']. ' to ' .$event['Event']['end_time']; ?> <br/><br/>
                    <b>Email: </b><?php echo $event['Event']['email']; ?> <br/><br/>
                    <b>Phone: </b><?php echo $event['Event']['telephone']; ?> <br/><br/>
                    <b>Reference: </b><?php echo $event['Event']['reference']; ?> <br/><br/>
                    <b>Provider: </b><?php echo h($this->Status->translateProvider($event['Event']['provider_id'])); ?> <br/><br/>
                    <b>Category: </b><?php echo h($this->Status->translateCategories($event['Event']['category_id'])); ?> <br/><br/>
                </p>
                
            </div>
            
        </div>
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>Venue</h3>
            </div>
            <?php 
            if(!isset($venue)){ ?>
                
                <div class='box-body'>
                <p>You have not added a Venue to your event. Please click the button bellow to add a Venue</p>
                <?php echo $this->Html->link('Add Venue', array('controller' => 'Venues', 'action' => 'cloud_add_event_venue',$event['Event']['id']), array('class' => 'btn btn-success btn-flat'));?>
                
                </div>
            <?php } else { ?>
                <div class='box-body'>
                <p>
                    <b>Venue: </b><?php echo $venue['Venue']['name']; ?> <br/><br/>
                    <b>Website: </b><?php echo $venue['Venue']['website']; ?> <br/><br/>
                    <b>Venue Type: </b><?php echo $venue['Venue']['type']; ?> <br/><br/>
                </p>
                
                </div>
           <?php } ?>
            
            
        </div>
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>Organiser</h3>
            </div>
            <?php 
            if(!isset($organiser)){ ?>
                
                <div class='box-body'>
                <p>You have not added an Organiser to your event. Please click the button bellow to add an Organiser</p>
                <?php echo $this->Html->link('Add Organiser', array('controller' => 'Organisers', 'action' => 'cloud_add_event_organiser',$event['Event']['id']), array('class' => 'btn btn-success btn-flat'));?>
                </div>
            <?php } else { ?>
                <div class='box-body'>
                <p>Yay, you have an organiser</p>
                </div>
           <?php } ?>
            
            
        </div>
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>Tickets</h3>
            </div>
            <?php 
            if(!isset($tickets)){ ?>
                
                <div class='box-body'>
                <p>You have not added ticket prices for your event. Please click the button bellow to add Tickets and Prices to your event</p>
                <?php echo $this->Html->link('Add Tickets', array('controller' => 'Tickets', 'action' => 'cloud_add_event_tickets',$event['Event']['id']), array('class' => 'btn btn-success btn-flat'));?>
                </div>
            <?php } else { ?>
                <div class='box-body'>
                <p>Yay, you have an tickets</p>
                </div>
           <?php } ?>
            
            
        </div>
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>Urls</h3>
            </div>
            <?php 
            
            if(!isset($urls)){ ?>
                
                <div class='box-body'>
                <p>You have not added urls for your event. Please click the button bellow to add urls to your event</p>
                <?php echo $this->Html->link('Add Urls', array('controller' => 'EventUrls', 'action' => 'cloud_add_urls',$event['Event']['id']), array('class' => 'btn btn-success btn-flat'));?>
                </div>
            <?php } else { ?>
                <div class='box-body'>
                <p>Yay, you have urls</p>
                </div>
           <?php } ?>
            
            
        </div>
        
    </div>
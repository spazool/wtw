<div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'><?php echo $venue['Venue']['name']; ?></h3>
            </div>
            <div class='box-body'>
                <p><?php echo $venue['Venue']['description']; ?></p>
                <p>
                    <b>Logo: </b>To be added still<br/><br/>
                    <b>Email: </b><?php echo $venue['Venue']['email']; ?> <br/>
                    <b>Phone: </b><?php echo $venue['Venue']['phone']; ?> <br/>
                    <b>Type: </b><?php echo $this->Status->translateVenueType($venue['Venue']['type']); ?> <br/><br/>
                    <b>Address Line 1: </b><?php echo $venue['Venue']['address_line_one']; ?> <br/>
                    <b>Address Line 2: </b><?php echo $venue['Venue']['address_line_two']; ?> <br/>
                    <b>City: </b><?php echo $this->Status->translateCity($venue['Venue']['city_id']); ?> <br/>
                    <b>Province: </b><?php echo $this->Status->translateProvince($venue['Venue']['province_id']); ?> <br/>
                    <b>Country: </b><?php echo $this->Status->translateCountry($venue['Venue']['country_id']); ?> <br/><br/>
                    <b>Created: </b><?php echo $venue['Venue']['created']; ?> <br/>
                    
                </p>
                
                
            </div>
            
        </div>
        
    </div>



    
    <div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'><?php echo $provider['Provider']['name']; ?></h3>
            </div>
            <div class='box-body'>
                <p><?php echo $provider['Provider']['description']; ?></p>
                <p>
                    <b>Contact Name: </b><?php echo $provider['Provider']['contact_name']; ?> <br/><br/>
                    <b>Email: </b><?php echo $provider['Provider']['email']; ?> <br/>
                    <b>Phone: </b><?php echo $provider['Provider']['phone']; ?> <br/>
                    <b>Fax: </b><?php echo $provider['Provider']['fax']; ?> <br/><br/>
                    <b>Address Line 1: </b><?php echo $provider['Provider']['address_line_one']; ?> <br/>
                    <b>Address Line 2: </b><?php echo $provider['Provider']['address_line_two']; ?> <br/>
                    <b>City: </b><?php echo $this->Status->translateCity($provider['Provider']['city_id']); ?> <br/>
                    <b>Province: </b><?php echo $this->Status->translateProvince($provider['Provider']['province_id']); ?> <br/>
                    <b>Country: </b><?php echo $this->Status->translateCountry($provider['Provider']['country_id']); ?> <br/><br/>
                    <b>Status: </b><?php echo $this->Status->translateUserStatus($provider['Provider']['status']); ?> <br/><br/>
                    <b>Created: </b><?php echo $provider['Provider']['created']; ?> <br/>
                    
                </p>
                
                
            </div>
            
        </div>
        
    </div>


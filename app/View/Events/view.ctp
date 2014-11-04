<div class="row-fluid event-view">
    <div class="span4 image">
        <img src="/img/events/<?php echo $event['Event']['image']; ?>" />
    </div>
    <div class="span8">
        <div class="title">
            <?php echo $event['Event']['name']; ?>
        </div>
        <div class="date">
            <?php echo $event['Event']['date']; ?>
        </div>
        <div class="time">
            <?php echo $event['Event']['time']; ?>
        </div>
        <div class="description">
            <?php echo $event['Event']['description']; ?>
        </div>
        <div class="contacts">
            <h3>Contact Details</h3>
            <i class="icon-envelope"></i> <a href="mailto:<?php echo $event['Event']['email']; ?>"><?php echo $event['Event']['email']; ?></a><br />
            <i class="icon-phone-sign"></i> <?php echo $event['Event']['telephone']; ?><br />
            <i class="icon-list-alt"></i> <?php echo $event['Event']['category']; ?><br />
            <?php 
            if(!empty($event_urls)) {
                foreach($event_urls as $url) {
                    echo '<i class="icon-external-link-sign"></i> <a href="' .$url['EventUrl']['url'] . '" target="_blank">' . $url['EventUrl']['name'] . '</a><br />';
                }
            }
            ?>
        </div>
        <div class="tickets">
            <h3>Tickets</h3>
            <?php
            if(!empty($tickets)){
                foreach($tickets as $ticket){
                    echo '<div class="ticket">';
                    echo '<i class="icon-ticket"></i> ' . $ticket['Ticket']['ticket_name'].'<br/>';
                    echo '<i class="icon-money"></i> ' . $ticket['Ticket']['price'];
                    echo '</div>';
                }
            }
            ?>
        </div>
        <div class="organisers">
            <h3>Event Organisers</h3>
            <i class="icon-building"></i> <?php echo $organiser['Organiser']['organiser_name']; ?><br />
            <i class="icon-user"></i> <?php echo $organiser['Organiser']['contact_name']; ?><br />
            <i class="icon-phone-sign"></i> <?php echo $organiser['Organiser']['telephone']; ?><br />
            <i class="icon-envelope"></i> <a href="mailto:<?php echo $organiser['Organiser']['email']; ?>"><?php echo $organiser['Organiser']['email']; ?></a><br />
            <i class="icon-external-link-sign"></i> <a href="<?php echo $organiser['Organiser']['website']; ?>" target="_blank"><?php echo $organiser['Organiser']['website']; ?></a><br />
        </div>
        <div class="venue">
            <h3>Venue</h3>
            <div class="row-fluid">
                <?php if($venue['Venue']['logo']) : ?>
                <div class="span4">
                    <img src="<?php echo $venue['Venue']['logo'];?>" />
                </div>
                <div class="span8">
                <?php else: ?>
                <div class="span12">
                <?php endif; ?>
                    <i class="icon-road"></i> <?php echo $venue['Venue']['name']; ?><br />
                    <i class="icon-info-sign"></i> <?php echo $venue['Venue']['description']; ?><br />
                    <i class="icon-phone-sign"></i> <?php echo $venue['Venue']['phone']; ?><br />
                    <i class="icon-envelope"></i> <a href="mailto:<?php echo $venue['Venue']['email']; ?>"><?php echo $venue['Venue']['email']; ?></a><br />
                    <i class="icon-map-marker"></i> <?php echo $venue['Venue']['address_line_one']; ?><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $venue['Venue']['address_line_two']; ?><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateCountry($venue['Venue']['country_id']); ?><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateProvince($venue['Venue']['province_id']); ?><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateCity($venue['Venue']['city_id']); ?><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $venue['Venue']['latitude']; ?>&nbsp;&nbsp;<?php echo $venue['Venue']['longitude']; ?><br />
                    <i class="icon-external-link-sign"></i> <a href="<?php echo $venue['Venue']['website']; ?>" target="_blank"><?php echo $venue['Venue']['website']; ?></a><br />
                    <!--MAPS-->
                        
                        
                    
                </div>
                    <div class="span12">
                        <div id="map-canvas" style="height:300px;"></div>
                    </div>    
            </div>
        </div>
    </div>
</div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8TbsTA7B_3jxH5Tq77Aj-7MVjXF8Vlc"></script>
    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $venue['Venue']['latitude']; ?>, <?php echo $venue['Venue']['longitude']; ?>); //venue latitude and longitude
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo $venue['Venue']['name']; ?>'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

    

    
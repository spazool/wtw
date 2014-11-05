<div class="row-fluid event-view">
  <div class="span4 image">
    <img src="/img/events/<?php echo $event['Event']['image']; ?>"/>

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
    <div class="date">
      <?php echo $event['Event']['reference']; ?>
    </div>
    <div class="description">
      <?php echo nl2br($event['Event']['description']); ?>
    </div>
    <?php echo $this->Html->link('Edit Event', array('controller' => 'events', 'action' => 'edit_event', $event['Event']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Edit Image', array('controller' => 'events', 'action' => 'edit_event_image', $event['Event']['id']), array('class' => 'btn')); ?>
    <div class="contacts">
      <h3>Contact Details</h3>
      <i class="icon-envelope"></i> <a href="mailto:<?php echo $event['Event']['email']; ?>"><?php echo $event['Event']['email']; ?></a><br />
      <i class="icon-phone-sign"></i> <?php echo $event['Event']['telephone']; ?><br />
      <i class="icon-list-alt"></i> <?php echo $event['Event']['category']; ?><br />
      <?php
      if (!empty($event_urls)) {
        foreach ($event_urls as $url) {
          echo '<i class="icon-external-link-sign"></i> <a href="' . $url['EventUrl']['url'] . '" target="_blank">' . $url['EventUrl']['name'] . '</a><br />';
        }
      } else {
        echo $this->Html->link('Add Website', array('controller' => 'eventUrls', 'action' => 'edit_event_url', $event['Event']['id']));
      }
      ?>
    </div>
    <div class="tickets">
      <h3>Tickets | <?php echo $this->Html->link('add new ticket', array('controller' => 'tickets', 'action' => 'add_event_ticket', $event['Event']['id'])); ?></h3>
      <?php
      if (!empty($tickets)) {
        foreach ($tickets as $ticket) {
          echo '<div class="ticket">';
          if (!empty($ticket['Ticket']['ticket_name'])) {
            echo '<i class="icon-ticket"></i> ' . $ticket['Ticket']['ticket_name'] . '<br/>';
          }
          if (!empty($ticket['Ticket']['price'])) {
            echo '<i class="icon-money"></i> ' . $ticket['Ticket']['price'] . ' ' . $this->Html->link('edit', array('controller' => 'tickets', 'action' => 'edit_event_ticket', $ticket['Ticket']['id'])) . ' | ' . $this->Html->link('delete', array('controller' => 'tickets', 'action' => 'delete_ticket', $ticket['Ticket']['id'], $event['Event']['id']));
          }
          echo '</div>';
        }
      }
      ?>
    </div>
    <div class="organisers">
      <h3>Event Organiser | <?php echo $this->Html->link('edit', array('controller' => 'organisers', 'action' => 'edit_event_organiser', $event['Event']['id'])); ?></h3>

      <?php
      if (!empty($organiser)) {
        if (!empty($organiser['Organiser']['organiser_name'])) {
          echo '<i class="icon-building"></i> ' . $organiser['Organiser']['organiser_name'] . '<br />';
        }
        if (!empty($organiser['Organiser']['contact_name'])) {
          echo '<i class="icon-user"></i> ' . $organiser['Organiser']['contact_name'] . '<br />';
        }
        if (!empty($organiser['Organiser']['telephone'])) {
          echo '<i class="icon-phone-sign"></i> ' . $organiser['Organiser']['telephone'] . '<br />';
        }
        if (!empty($organiser['Organiser']['email'])) {
          echo '<i class="icon-envelope"></i> <a href="mailto:' . $organiser['Organiser']['email'] . '">' . $organiser['Organiser']['email'] . '</a><br />';
        }
        if (!empty($organiser['Organiser']['website'])) {
          echo '<i class="icon-external-link-sign"></i> <a href="' . $organiser['Organiser']['website'] . '" target="_blank">' . $organiser['Organiser']['website'] . '</a><br />';
        }
      }
      ?>

    </div>
    <div class="venue">
      <h3>Venue | <?php echo $this->Html->link('edit', array('controller' => 'venues', 'action' => 'edit_event_venue', $event['Event']['id'])); ?></h3>
      <div class="row-fluid">
        <?php
        if (!empty($venue)) {
          ?>
          <?php if ($venue['Venue']['logo']) : ?>
            <div class="span4">
              <img src="<?php echo $venue['Venue']['logo']; ?>" />
            </div>
            <div class="span8">
            <?php else: ?>
              <div class="span12">
              <?php endif; ?>
              <?php if (!empty($venue['Venue']['name'])) { ?>
                <i class="icon-road"></i> <?php echo $venue['Venue']['name']; ?><br />
              <?php } ?>
              <?php if (!empty($venue['Venue']['description'])) { ?>
                <i class="icon-info-sign"></i> <?php echo $venue['Venue']['description']; ?><br />
              <?php } ?>
              <?php if (!empty($venue['Venue']['phone'])) { ?>
                <i class="icon-phone-sign"></i> <?php echo $venue['Venue']['phone']; ?><br />
              <?php } ?>
              <?php if (!empty($venue['Venue']['email'])) { ?>
                <i class="icon-envelope"></i> <a href="mailto:<?php echo $venue['Venue']['email']; ?>"><?php echo $venue['Venue']['email']; ?></a><br />
              <?php } ?>
              <?php if (!empty($venue['Venue']['address_line_one'])) { ?>
                <i class="icon-map-marker"></i> <?php echo $venue['Venue']['address_line_one']; ?><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $venue['Venue']['address_line_two']; ?><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateCountry($venue['Venue']['country_id']); ?><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateProvince($venue['Venue']['province_id']); ?><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->Status->translateCity($venue['Venue']['city_id']); ?><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $venue['Venue']['latitude']; ?>&nbsp;&nbsp;<?php echo $venue['Venue']['longitude']; ?><br />
              <?php } ?>
              <?php if (!empty($venue['Venue']['website'])) { ?>
                <i class="icon-external-link-sign"></i> <a href="<?php echo $venue['Venue']['website']; ?>" target="_blank"><?php echo $venue['Venue']['website']; ?></a><br />
              <?php } ?>
              <!--MAPS-->

            </div>
            <div class="span12">
              <div id="map-canvas" style="height:300px;"></div>
            </div>    
          </div>

          <?php
        }
        ?>
        <div class="row-fluid">
          <div class="span12">
            <?php echo $this->Html->link('Cancel', array('controller' => 'events', 'action' => 'my_events'), array('class' => 'btn')); ?>
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
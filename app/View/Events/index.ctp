<!-- Start HOME FEATURED -->
<div id="home-featured" class="featured row-fluid">

  <?php foreach ($featured_events as $featured_event) { ?>

    <div class="item span4">
      <div class="inner-padding">
        <div class="img-white-border">
          <a href="#">
            <div class="image">
              <?php
              echo $this->Html->image("/img/events/" . $featured_event['Event']['image'], array(
                  "alt" => $featured_event['Event']['name'],
                  'url' => array('controller' => 'Events', 'action' => 'view', $featured_event['Event']['id'])
              ));
              ?>
            </div>
          </a>
        </div>
        <div class="title"><a href="#"><?php echo $this->Html->link($featured_event['Event']['name'], array('controller' => 'Events', 'action' => 'view', $featured_event['Event']['id'])); ?></a></div>
        <div class="date"><a href="#"><?php echo $this->Time->format($featured_event['Event']['start_date'], '%B %e %Y'); ?></a></div>



        <div class="desc"><?php
          echo $this->Text->truncate(
                  $featured_event['Event']['description'], 200, array(
              'ellipsis' => '...',
              'exact' => false
                  )
          );
          ?></div>
        <!--<button href="" class="btn readmore">read more</button>-->
        <?php echo $this->Html->link('read more', array('controller' => 'Events', 'action' => 'view', $featured_event['Event']['id']), array('class' => 'btn readmore', 'style' => 'color:white')); ?>
        <?php // echo $this->Form->button($this->Html->link('read more', array('controller' => 'Events', 'action' => 'view',$featured_event['Event']['id']))); ?>
      </div>
    </div>
  <?php } ?>

</div>
<!-- End HOME FEATURED -->

<!-- Start EVENTS -->
<h3>Upcoming Events | <?php echo $this->Html->link('view all', array('controller' => 'events', 'action' => 'events_filter', 'null', 'null', 'null')); ?></h3>
<div id="home-events" class="events">
  <?php foreach ($events as $event) { ?>
    <div class="item">
      <div class="row-fluid even-heights">
        <div class="span3 left">
          <div class="date"><?php echo $this->Time->format($event['Event']['start_date'], '%e %b'); ?></div>
          <a href="#">
            <div class="image">
              <?php
              echo $this->Html->image("/img/events/" . $event['Event']['image'], array(
                  "alt" => $event['Event']['name'],
                  'url' => array('controller' => 'Events', 'action' => 'view', $event['Event']['id'])
              ));
              ?>
            </div>
          </a>
        </div>
        <div class="span6 info">
          <div class="title"><?php echo $this->Html->link($event['Event']['name'], array('controller' => 'Events', 'action' => 'view', $event['Event']['id'])); ?></div>
          <div class="description"><?php
            echo $this->Text->truncate(
                    $event['Event']['description'], 500, array(
                'ellipsis' => '...',
                'exact' => false
                    )
            );
            ?></div>
          <div class="row-fluid description-footer">
            <!-- Van Wie: BEGIN Code for phone vs desktop visibility -->
            <div class="span4 hidden-phone">

              <?php echo $this->Html->link('read more', array('controller' => 'Events', 'action' => 'view', $event['Event']['id']), array('class' => 'btn readmore span4', 'style' => 'color:white')); ?>

            </div>
            
            <div class="span2 hidden-desktop">
              <?php echo $this->Html->link('read more', array('controller' => 'Events', 'action' => 'view', $event['Event']['id']), array('class' => 'btn readmore', 'style' => 'color:white')); ?>
            </div>
            <!-- Van Wie: END Code for phone vs desktop visibility -->
            
            <div class="span8 social-media">
              <a href="https://twitter.com/share?url=http%3A%2F%2Fwww.wheresthewine.co.za%2Fevents%2Fview%2F<?php echo $event['Event']['id']; ?>&text=<?php echo $event['Event']['name']; ?>" target="_blank" ><i class="icon-twitter"></i></a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.wheresthewine.co.za%2Fevents%2Fview%2F<?php echo $event['Event']['id']; ?>&text=<?php echo $event['Event']['name']; ?>" target="_blank"><i class="icon-facebook"></i></a>
  <!--              <a href="#"><i class="icon-linkedin"></i></a>-->
            </div>
          </div>
        </div>

        <div class="span3 details">
          <table class="list">
            <tr>
              <td class="icons"><i class="icon-map-marker"></i></td>
              <td class="info"><?php echo $event['Venue']['name']; ?></td>
            </tr>
            <tr>
              <td class="icons"><i class="icon-money"></i></td>
              <td class="info"><?php echo $event['Ticket']['price']; ?></td>
            </tr>
            <tr>
              <td class="icons"><i class="icon-calendar"></i></td>
              <td class="info"><?php echo $this->Time->format($event['Event']['start_date'], '%e %b %Y') . ' to ' . $this->Time->format($event['Event']['end_date'], '%e %b %Y'); //from to      ?></td>
            </tr>
            <tr>
              <td class="icons"><i class="icon-time"></i></td>
              <td class="info"><?php echo $this->Time->format('h:i A', $event['Event']['start_time']) . ' to ' . $this->Time->format('h:i A', $event['Event']['end_time']); //from to      ?></td>
            </tr>

            <!--'F jS, Y h:i A',-->

          </table>
        </div>
      </div>

    </div>
  <?php } ?>
  <?php
  echo $this->element('pagination_controls');
  ?>

</div>
<!-- End EVENTS -->

<!-- Recent Events -->
<?php echo $this->Element('recent-events'); ?>

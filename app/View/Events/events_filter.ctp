<?php if($events): ?>
<div id="home-events" class="events">
        <?php foreach ($events as $event) { ?>
            <div class="item">
		<div class="row-fluid even-heights">
			<div class="span3 left">
				<div class="date"><?php echo $this->Time->format($event['Event']['start_date'], '%e %b');  ?></div>
				<a href="#">
					<div class="image">
						<?php
							echo $this->Html->image("/img/events/" . $event['Event']['image'], array(
							    "alt" => $event['Event']['name'],
							    'url' => array('controller' => 'Events', 'action' => 'view',$event['Event']['id'])
							));
						?>
					</div>
				</a>
			</div>
			<div class="span6 info">
                            <div class="title"><?php echo $this->Html->link($event['Event']['name'], array('controller' => 'Events', 'action' => 'view',$event['Event']['id']));?></div>
				<div class="description"><?php echo $this->Text->truncate(
                                                                    $event['Event']['description'],
                                                                    500,
                                                                    array(
                                                                        'ellipsis' => '...',
                                                                        'exact' => false
                                                                    )
                                                                );?></div>
				<div class="row-fluid description-footer">
					<div class="span4">
                                            <?php echo $this->Html->link('read more', array('controller' => 'Events', 'action' => 'view',$event['Event']['id']),array('class' => 'btn readmore span4','style' => 'color:white'));?>
                                            
						
					</div>
					<div class="span8 social-media">
                                            <a href="https://twitter.com/share?url=http%3A%2F%2Fwww.wheresthewine.co.za%2Fevents%2Fview%2F<?php echo $event['Event']['id']; ?>&text=<?php echo $event['Event']['name']; ?>" target="_blank" ><i class="icon-twitter"></i></a>
<!--						<a href="#"><i class="icon-twitter"></i></a>
						<a href="#"><i class="icon-facebook"></i></a>
						<a href="#"><i class="icon-linkedin"></i></a>-->
					</div>
				</div>
			</div>
			<div class="span3 details">
				<table class="list">
					<tr>
						<td class="icons"><a href="#"><i class="icon-map-marker"></i></a></td>
						<td class="info"><?php echo $event['Venue']['name']; ?></td>
					</tr>
					<tr>
						<td class="icons"><a href="#"><i class="icon-money"></i></a></td>
						<td class="info"><?php echo $event['Ticket']['price']; ?></td>
					</tr>
					<tr>
						<td class="icons"><a href="#"><i class="icon-calendar"></i></a></td>
                                                
						<td class="info"><?php  echo $this->Time->format($event['Event']['start_date'], '%e %b %Y').' to '.$this->Time->format($event['Event']['end_date'], '%e %b %Y');//from to ?></td>
                                        </tr>
                                        <tr>
						<td class="icons"><a href="#"><i class="icon-time"></i></a></td>
						<td class="info"><?php  echo $this->Time->format('h:i A',$event['Event']['start_time']).' to '.$this->Time->format('h:i A',$event['Event']['end_time']);//from to ?></td>
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
<?php else: ?>
	<p align="center">
		<img src="/img/no-results.gif" />
	</p>
<?php endif; ?>
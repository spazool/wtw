<h3>Recent Events | <?php echo $this->Html->link('view all',array('controller' => 'events','action' => 'events_filter','null','null','past')); ?></h3>
<div id="recents-events" class="row-fluid recent-events">
    <?php foreach ($past_events as $past_event) : ?>
	<div class="span3 item">
		<div class="image">
			<?php
				echo $this->Html->image("/img/events/" . $past_event['Event']['image'], array(
				    "alt" => $past_event['Event']['name'],
				    'url' => array('controller' => 'Events', 'action' => 'view',$past_event['Event']['id'])
				));
			?>
		</div>
		<div class="title"><a href="#"><?php echo $this->Html->link($past_event['Event']['name'], array('controller' => 'Events', 'action' => 'view',$past_event['Event']['id']));?></a></div>
		<div class="rate-recent">
			Attended this event? Rate it:
			<div id="rating<?php echo $past_event['Event']['id']; ?>" class="rating"></div>
			<div id="score<?php echo $past_event['Event']['id']; ?>" class="rating-score"></div>
		</div>
		<div class="social-media">
<!--			<a href="#"><i class="icon-twitter"></i></a>
			<a href="#"><i class="icon-facebook"></i></a>
			<a href="#"><i class="icon-linkedin"></i></a>
			<a href="#"><i class="icon-instagram"></i></a>-->
		</div>
	</div>
	<?php endforeach; ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$.fn.raty.defaults.path = '/img';

		/*loop through php foreach to instantiate each raty item*/
		<?php
		foreach($past_events as $recent) {
			echo '$("#rating' . $recent['Event']['id'] . '").raty({
				score: ' . $recent['Event']['score'] . ',
				target: "#score' . $recent['Event']['id'] . '",
				targetKeep: true,
				targetType: "score",
				//click: console.log("clicked"),
				half: true
			});';
			echo '$("#rating' . $recent['Event']['id'] . '").click(function(){postRating("' . $recent['Event']['id'] . '", $("#score' . $recent['Event']['id'] . '").text())});';
		}
		?>
	});
</script>
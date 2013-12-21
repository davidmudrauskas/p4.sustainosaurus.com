<!--<div style="overflow-x: scroll; white-space: nowrap; padding: 5px">-->


	<?php 
		$first_start_year = $state_timespans[0]['start_year'];
		
		foreach($state_timespans as $timespan): 
			$duration = $timespan['end_year'] - $timespan['start_year'];
			$margin_left = $timespan['start_year'] - $first_start_year;
	?>
	
	<div class=timespan id="<?=$timespan['state']?>" style="width: <?=$duration?>px; margin-left: <?=$margin_left?>px;">
		
		<?=$timespan['display_name']?>
		</br>
		<?=$timespan['start_year']?>-<?=$timespan['end_year']?>
		
		<div class=description id="<?=$timespan['state']?>_description"></div>
	</div>
	
	<script> var state = <?=$timespan['state']?>; </script>
	<?php endforeach; ?>

<!--</div>-->

</br>
</br>
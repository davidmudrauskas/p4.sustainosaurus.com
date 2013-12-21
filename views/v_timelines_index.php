<!--<div style="overflow-x: scroll; white-space: nowrap; padding: 5px">-->


	<?php 
		$first_start_year = $state_timespans[0]['start_year'];
		$counter = 0;

		foreach($state_timespans as $timespan): 
			$duration = abs($timespan['end_year'] - $timespan['start_year']);
			if($counter == 0) {
				$margin_left = 0;
			}

			else {
				$margin_left = $margin_left + $state_timespans[$counter]['start_year'] - $state_timespans[$counter - 1]['start_year'];
			}

			$counter = $counter + 1;
			
			//$margin_left = $timespan['start_year'] - $first_start_year;

	?>
	
	<div class=timespan id="<?=$timespan['state']?>" style="width: <?=$duration?>px; margin-left: <?=$margin_left?>px;">
		
		<!--<div style="position: absolute; overflow-x: visible;">=-->
		<?=$timespan['display_name']?>
		</br>
		<?=abs($timespan['start_year'])?>-<?=abs($timespan['end_year'])?> <?=$timespan['end_year_type']?>
		<!--</div>-->

		<div class=description id="<?=$timespan['state']?>_description"></div>
	</div>
	
	<script> var state = <?=$timespan['state']?>; </script>
	<?php endforeach; ?>

<!--</div>-->

</br>
</br>
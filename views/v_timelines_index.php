<?php

	foreach($state_timespans as $timespan): 
		
		$duration = abs($timespan['end_year'] - $timespan['start_year']);

		if($counter == 0) {
			$margin_left = 0;
		}

		else {
			$margin_left = $margin_left + $state_timespans[$counter]['start_year'] - $state_timespans[$counter - 1]['start_year'];
		}

		$counter = $counter + 1;

?>

<div class="timeline_offset" style="margin-left: <?=$margin_left?>px;">

	<div class="timespan" id="<?=$timespan['css_id']?>" style="width: <?=$duration?>px;">

		
		<div class="duration" style="width: <?=$duration?>px;">

			<div class="<?=$timeline_option?>_background">
				
				<div class="<?=$timeline_option?>_text">
					<?=$timespan['display_name']?>
				</div>

				<?=abs($timespan['start_year'])?>-<?=abs($timespan['end_year'])?> <?=$timespan['end_year_type']?>

			</div>

		</div>
		
		
		<div class="description" id="<?=$timespan['css_id']?>_description"></div>


	</div>

</div>

<?php endforeach; ?>
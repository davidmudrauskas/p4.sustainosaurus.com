
<!-- <div style="background-color: pink; height: 200px; width: 400px;">
	<div style="background-color: blue; height: 100px; width: 500px; float:left">>

	</div>
</div> -->

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

?>

<div class="timeline_offset" style="margin-left: <?=$margin_left?>px;">

	<div class="timespan" id="<?=$timespan['state']?>" style="width: <?=$duration?>px;">

		<div class="duration" style="width: <?=$duration?>px;">
		
			<!-- <div style="position: absolute; overflow-x: visible;"> -->

			<div class="<?=$timeline_option?>_background">
				
				<div class="<?=$timeline_option?>_text">
					<?=$timespan['display_name']?>
				</div>

				<!-- <img class="expand" src="/images/expand.png" alt="expand">
				<img class="collapse" src="/images/collapse.png" alt="collapse"> -->

				<?=abs($timespan['start_year'])?>-<?=abs($timespan['end_year'])?> <?=$timespan['end_year_type']?>

			</div>

		</div>
		
		<div class="description" id="<?=$timespan['state']?>_description"></div>

	</div>

</div>

<script> var state = <?=$timespan['state']?>; </script>
<?php endforeach; ?>

</br>
</br>
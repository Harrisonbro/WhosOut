<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<!-- <pre><? print_r($people); foreach($entries as $e) {
	print_r($e->date); echo ", "; print_r($e->person_id); echo "<br/>"
;	} ?></pre> -->
	
	<div class="calendar--wrapper">
	<div class="calendar">
		<?php foreach($days as $d) : ?>
			<div class="day">
				<div class="day__head">
					<div class="day__dow"><?=$d->date->format('D')?></div>
					<div class="day__date"><?=$d->date->format('j M')?></div>
				</div><!-- .day__head -->
				entries: <?php foreach($d->entries as $e) {echo $people[$e->person_id]->firstname.', ';} ?>
			</div><!-- .day -->
		<?php endforeach; ?>
	</div><!-- .calendar -->
	</div><!-- .calendar--wrapper -->
	
	<div class="instruction">Choose person's schedule to edit:</div>

	<div class="people">
		<?php foreach($people as $p) : ?>
			<div class="person">
				<img class="person__avatar" src="images/people/<?=$p->avatar?>.jpg" alt="<?=$p->firstname?>">
			</div><!-- .person -->
		<?php endforeach; ?>
	</div><!-- .people -->

	<!-- <pre><?php 
		print_r($days); 
		print_r($entries); 
		print_r($people); 
	?></pre> -->

</body>
</html>